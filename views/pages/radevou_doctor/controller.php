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
            $apointment->appendChild($xml->createElement('age',$patientData->age));
            $apointment->appendChild($xml->createElement('status',$adata->status));

            $apointments->appendChild($apointment);            

        }

        $root->appendChild($apointments);

        // Τοποθετούμε το root με τα ραντεβού και όλους τους κόμβους σε όλο το xml.
        $xml->appendChild($root);


        // Ορίζουμε το property αυτό για να είναι beutified το xml
        $xml->formatOutput = true;

        // //Και τέλος σώζουμε το αρχείο στο students.xml
        $xml->save('doctorData.xml');

        //Φορτώνουμε το xml πάλι
        $dom = new DOMDocument;
        $dom->Load('doctorData.xml');
        //Το κάνουμε validate και αν υπαρχει πρόβλημα εμφανίζουμε το μήνυμα του λάθους
        libxml_use_internal_errors(TRUE);
        if (!$dom->validate()) {
            echo "<div style='background-color: black;color:red;border:1px solid black;padding:50px;'>Σφάλμα στο XML!. Παρακαλώ διορθώστε τα παρακάτω σφάλματα από το xml</div>";
            
            
            $error = libxml_get_errors();
            echo "<pre style='background-color: black;color:red;border:1px solid black;padding:50px;'>";            
            print_r($error);
            echo "<pre>";
            exit();
        }

        // Σε αυτο το σημείο λέμε στο lbxml να μην εμφανίζει τα warning και τα error πάνω στην σελίδα, για να ελέγξουμε το μήνυμα
        

        header('Location: ' . "doctorData.xml");
    }

    
}