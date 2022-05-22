<?php

class Controller{

    public function radevou_doctor(){
        $view = new view();
        $data = $_SESSION["user"];                
        $view->render("radevou_doctor", $data);
    }    
    
    public function update_status(){
        $view = new view();
        $data = $_SESSION["user"];

        $request = new Request();
        $request->get("status");

        $apointment =  new Appointment();
        $apointment->status = $request->get("status");
        $apointment->id = $request->get("id");

        $apointment->update(["status"]);
        
        $view->render("radevou_doctor", $data);
    }


    public function exportxml(){

        //Μετά φτιάχνω το αντικείμενο DOMDocument και την κωδικοποίηση σε UTF-8 για να παίζουν τα Ελληνικά
        $xml = new DOMDocument();
        $xml->encoding = 'UTF-8';
 
        //Έπειτα φτιάχνω ένα DOMImplementation για να περάσω το dtd και να κάνω το validate. Εδώ σε αυτό το σημείο το περνάω στην κορυφή του XML για να το κάνω validate
        $creator = new DOMImplementation;
        $doctype = $creator->createDocumentType("doctorData", "", 'doctorData.dtd');
        $xml->appendChild($doctype);

        $xslt = $xml->createProcessingInstruction('xml-stylesheet', 'type="text/xsl" href="doctorData.xsl"');
        $xml->appendChild($xslt);

        //Δημιουργώ το root του XML με την εντολή CreateElement 
        $root = $xml->createElement('doctorData');        
        $doctor = $root->appendChild($xml->createElement('doctor'));
        $center = $root->appendChild($xml->createElement('center'));
        $apointments = $root->appendChild($xml->createElement('apointments'));

        //Δημιουργώ το node των στοιχείων του γιατρού
        $doctor->appendChild($xml->createElement('fullname',$_SESSION["user"]->lastname." ".$_SESSION["user"]->name));
        $doctor->appendChild($xml->createElement('artaftotita', $_SESSION["user"]->artaftotitas));
        $doctor->appendChild($xml->createElement('email', $_SESSION["user"]->email));

        //Παίρνω το κέντρο του γιατρού μέσα από τον πίνακα του γιατρού
        $db =  new Doctor();
        $doctorData = $db->select(["user_id="=>$_SESSION["user"]->id])[0];
        $db =  new Vaccination_center();
        $centerData = $db->select(["id="=>$doctorData->vaccination_center_id])[0];

        //Δημιουργώ το address,tk και phone node του κέντρου        
        $center->appendChild($xml->createElement('address', $centerData->address));
        $center->appendChild($xml->createElement('tk', $centerData->taxidromikos_kodikas));
        $center->appendChild($xml->createElement('phone', $centerData->phone));

        //Παίρνω και όλα τα ραντεβού που αφορούν το συγκεκριμένο κέντρο
        $db =  new Appointment();
        $appointmentData = $db->select(["vaccination_center_id ="=>$centerData->id]);
                        

        foreach($appointmentData as $adata){
            $apointment = $xml->createElement('apointment');
            $apointment->setAttribute("id", "x" . $adata->id);
            $apointment->appendChild($xml->createElement('datetime',$adata->appointment_date." ".$adata->appointment_time));
            $db =  new User();
            $patientData = $db->select(["id="=>$adata->user_id])[0];
            $apointment->appendChild($xml->createElement('fullname',$patientData->lastname." ".$patientData->name));
            $apointment->appendChild($xml->createElement('amka',$patientData->amka));
            $apointment->appendChild($xml->createElement('age',$patientData->afm));
            $apointment->appendChild($xml->createElement('status',$adata->status));

            $apointments->appendChild($apointment);            

        }

        $root->appendChild($apointments); 
        // echo $centerData->id;
        // print_r("<pre>");
        // print_r($appointmentData);
        // echo("<pre>");

        // //Έπειτα φτιάχνω ένα DOMImplementation για να περάσω το dtd και να κάνω το validate. Εδώ σε αυτό το σημείο το περνάω στην κορυφή του XML για να το κάνω validate
        // $creator = new DOMImplementation;
        // $doctype = $creator->createDocumentType("students", "", 'students.dtd');
        // $xml->appendChild($doctype);

        // //Εδώ κάνω το ίδιο για να εισάγω το XSL στην κορυφή του XML αρχείου
        // $xslt = $xml->createProcessingInstruction('xml-stylesheet', 'type="text/xsl" href="students.xsl"');
        // $xml->appendChild($xslt);

        // //Εδώ ξεκινάω με ένα μικρό έλεγχο πριν στήσω τα δεδομένα του xml. Τσεκάρω αν υπάρχουν δεδομένα από την βάση. Αν δεν υπάρχουν τότε λέω πως δεν υπάρχουν φοιτητές για το τρέχον εξάμηνο
        // //Αλλά εμφανίζω τους φοιτητές του προηγούμενου εξαμήνου. Λίγο περίπλοκο το κάνω αλλά είναι ο μόνος τρόπος να εμφανίζω πληροφορία προηγούμεννω εξαμήνων ενώ δεν υπάρχουν στο τρέχον.
        // //Το hassesmester έρχετε από το query τεχνιτά. Δηλαδή αν δείτε το query Κάνει το select του και σε κάθε εξάμηνο ελέγχει αν το τρέχον εξάμηνο είναι ίδιο με αυτό που έχει επιλεχθεί. 
        // //Αν δεν είναι φαίρνει false δηλαδή 0, αλλιώς 1. Αν έστω και ενα είναι 1 τότε υπάρχει κάποιος φοιτητές στο εν λόγο εξάμηνο αλλιώς το flag θα παραμήνει false για την παραγωγή του 
        // //τελικού μηνύματος στο τέρμα της σελίδας
        // $hassemester = false;
        // foreach ($data as $user) {
        // if ($user["hassemester"] > 0) {
        //     $hassemester = true;
        // }

        // //Ξεκινάμε να φτιάχνουμε το xml με το CreateElement
         
        // $userElement->setAttribute("id", "x" . $user["id"]);

        // //Δημιουργούμε και κάνουμε append τα δεδομένα στο userElement που είναι το student
        // $userElement->appendChild($xml->createElement('rank', $user["rank"]));
        // $userElement->appendChild($xml->createElement('name', $user["name"]));
        // $userElement->appendChild($xml->createElement('lastname', $user["lastname"]));
        // $userElement->appendChild($xml->createElement('email', $user["email"]));
        // $userElement->appendChild($xml->createElement('am', $user["am"]));
        // $userElement->appendChild($xml->createElement('semester', $user["semester"]));
        // $userElement->appendChild($xml->createElement('average', $user["average"]));
        // $userElement->appendChild($xml->createElement('passed', $user["courses"]));


        // $root->appendChild($userElement);
        // }

        // //Τοποθετούμε το το userElement στο root. Ο λόγος που ονομάστηκε user και όχι Student είναι επειδή ο student είναι user.
         $xml->appendChild($root);


        // //Ορίζουμε το property αυτό για να είναι beutified το xml
         $xml->formatOutput = true;

        // //Και τέλος σώζουμε το αρχείο στο students.xml
         $xml->save('doctorData.xml');

        // //Σε αυτο το σημείο λέμε στο lbxml να μην εμφανίζει τα warning και τα error ακατάστατα πάνω στην σελίδα, για να ελέγξουμε το μήνυμα
         libxml_use_internal_errors(TRUE);
    }
}