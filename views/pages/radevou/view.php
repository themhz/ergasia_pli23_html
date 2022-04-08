<?php


?>

<form>
    <table>
        <tr><td>Όνομα:</td><td><?php echo isset($name)? $name:""; ?></td></tr>
        <tr><td>Επόνυμο:</td><td><?php echo isset($lastname)? $lastname:""; ?></td></tr>
        <tr><td>Α.Μ.Κ.Α:</td><td><?php echo isset($amka)? $amka:""; ?></td></tr>
        <tr><td>Α.Φ.Μ:</td><td><?php echo isset($afm)? $afm:""; ?></td></tr>
        <tr><td>Αριθμός Ταυτ.:</td><td><?php echo isset($artaftotitas)? $artaftotitas:""; ?></td></tr>
        <tr><td>Ηλικία:</td><td><?php echo isset($age)? $age:""; ?></td></tr>
        <tr><td>Φύλλο:</td><td><?php echo isset($gender)? $gender:""; ?></td></tr>
        <tr><td>Email:</td><td><?php echo isset($email)? $email:""; ?></td></tr>
        <tr><td>Κινητό Τηλ.:</td><td><?php echo isset($mobilephone)? $mobilephone:""; ?></td></tr>
    </table>
</form>

<?php

    $apointments = new Appointment();
    
?>
<br>
<table class="table" border=1>
<tr>
    <th>ID</th>
    <th>Κέντρο</th>
    <th>Ημεροηνία ραντεβού </th>
    <th>ώρα ραντεβού</th>
</tr>
<?php 
//Επιλογή της κράτησης εμβολιασμού
$hasApointment = $apointments->select(['user_id ='=>$id]);

//Έλεγχος αν έχει κάνει κράτηση. Αν δεν έχει γίνει, τότε θα ταξινομήσω βάση ημερομηνιών όλων των διαθέσιμων ραντεβού
if(empty($hasApointment)){

    //Πήγα να φτιάξω ένα μίνι orm αλλά δεν δουλεύει με το or σωστά έτσι όπως το έχω φτιάξει.. οπότε έβαλα να μπορώ να κάνω custom select
    //$apointments = $apointments->select( [], ["appointment_date"=> "asc", "user_id is"=>"null",]);
    $apointments = $apointments->customselect("select * from appointments where user_id is null or  user_id = 0 order by appointment_date asc");
    foreach ($apointments as $apointment){ ?>
    <tr>
        <!-- Εμφανίζω τα πεδία μου -->
        <td><?php echo $apointment->id ?></td>
        <td><?php echo $apointment->vaccination_center_id ?></td>    
        <td><?php echo $apointment->appointment_date ?></td>
        <td><?php echo $apointment->appointment_time ?></td>
        <td>
            <!-- Φόρμα για να μπορώ να κάνω κράτηση  -->
            <form action="?page=radevou&method=create" method="post">            
                <button>Κράτηση</button>
                <input type="text" style="display:none" name="id" id="id" value="<?php echo $apointment->id ?>" >
            </form>
        </td>
    </tr>
    
    <?php } 
}else{
   //Αν έχει κάνει ραντεβού τότε εμφανίζω μόνο αυτό
    foreach ($hasApointment  as $apointment){ ?>
    <tr>
        <td><?php echo $apointment->id ?></td>
        <td><?php echo $apointment->vaccination_center_id ?></td>    
        <td><?php echo $apointment->appointment_date ?></td>
        <td><?php echo $apointment->appointment_time ?></td>
        <td>
            <form action="?page=radevou&method=cancel" method="post">            
            <button>Ακύρωση</button>
            <input type="text" style="display:none" name="id" id="id" value="<?php echo $apointment->id ?>" >
            </form>
        </td>
    </tr>    
    <?php }
}
?>


</table>