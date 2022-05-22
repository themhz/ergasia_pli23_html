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
        
    $apointments = $apointments->customselect("select * from appointments a
	inner join vaccination_centers b on a.vaccination_center_id = b.id
    inner join doctors c on c.vaccination_center_id = b.id 
    where c.user_id =  ".$_SESSION["user"]->id."  order by appointment_date asc");
    foreach ($apointments as $apointment){ ?>
    <tr>
        <!-- Εμφανίζω τα πεδία μου -->
        <td><?php echo $apointment->id ?></td>
        <td><?php echo $apointment->vaccination_center_id ?></td>    
        <td><?php echo $apointment->appointment_date ?></td>
        <td><?php echo $apointment->appointment_time ?></td>
        <td>
            <!-- Φόρμα για να μπορώ να κάνω κράτηση  -->
            <form action="?page=radevou_doctor&method=update_status" method="post">
            <?php if($apointment->status == "0") {?>            
                <button>Ενημέρωση</button> 
                <input type="text" style="display:none" name="status" id="status" value="1" >
            <?php } else {?>    
                <button>ακύρωση</button> 
                <input type="text" style="display:none" name="status" id="status" value="0" >
            <?php } ?>
                
            
                <input type="text" style="display:none" name="id" id="id" value="<?php echo $apointment->id ?>" >                
            </form>
        </td>
    </tr>
    
    <?php }     
?>
</table>
<br>

<input type="button" value="Εξαγωγή XML" class="button" onclick="exportxml()" />
<script>
//Μια javascript συνάρτηση που στέλνει τον user να κάνει εξαγωγή του xml αρχείου από τον controller του φακέλου. Καλεί την μέθοδο studentsxml() μέσα στην php για να παράγει το αρχείο.
  function exportxml() {
    window.location = "?page=radevou_doctor&method=exportxml";
  }
</script>