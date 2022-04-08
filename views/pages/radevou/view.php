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
$apointments = $apointments->select();
?>
<br>
<table class="table" border=1>
<tr>
    <th>ID</th>
    <th>Κέντρο</th>
    <th>Ημεροηνία ραντεβού </th>
    <th>ώρα ραντεβού</th>
</tr>
<?php foreach ($apointments as $apointment){ ?>
<tr>
    <td><?php echo $apointment->id ?></td>
    <td><?php echo $apointment->vaccination_center_id ?></td>    
    <td><?php echo $apointment->appointment_date ?></td>
    <td><?php echo $apointment->appointment_time ?></td>
    <td>
        <form action="?page=radevou&method=cancel" method="post">
        <button>Ακύρωση</button>
        </form>
    </td>
</tr>

<?php } ?>

</table>