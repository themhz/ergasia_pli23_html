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
       //Το query που θα τρέξω για να επιλέξω την λίστα των ραντεβού.
        $conn = new mysqli('localhost', 'root', '', 'lambrou');
        $conn->set_charset("utf8");
        $data = array();
        $sql = "select * from appointments a 
                    inner join vaccination_centers b on a.vaccination_center_id = b.id
                    inner join doctors c on a.vaccination_center_id = c.vaccination_center_id    
                    inner join users d on d.id = c.user_id
                ;";

         $query = $conn->query($sql);

        //Αφού πάρω τα δεδομένα μου τα φέρνω σε έναν πίνακα 
        while ($row = $query->fetch_assoc()) {
            $data[] = $row;
        }

        print_r($data);

        //Μετά φτιάχνω το αντικείμενο DOMDocument και την κωδικοποίηση σε UTF-8 για να παίζουν τα Ελληνικά
        $xml = new DOMDocument();
        $xml->encoding = 'UTF-8';

        //Δημιουργώ το root του XML με την εντολή CreateElement 
        $root = $xml->createElement('apointements');
        //Και του βάζω ένα Attribue semester = με το επιλεγμένο
        //$root->setAttribute("semester", $semester);

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
        // $userElement = $root->appendChild($xml->createElement('student'));
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
        // $xml->appendChild($root);


        // //Ορίζουμε το property αυτό για να είναι beutified το xml
        // $xml->formatOutput = true;

        // //Και τέλος σώζουμε το αρχείο στο students.xml
        // $xml->save('pages/studentsreport/students.xml');

        // //Σε αυτο το σημείο λέμε στο lbxml να μην εμφανίζει τα warning και τα error ακατάστατα πάνω στην σελίδα, για να ελέγξουμε το μήνυμα
        // libxml_use_internal_errors(TRUE);
    }
}