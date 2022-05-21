<?php


?>

<form>
    <table>
        <tr><td>Όνομα:</td><td><input type="text" value="<?php echo isset($name)? $name:""; ?>"></td></tr>
        <tr><td>Επόνυμο:</td><td><input type="text" value="<?php echo isset($lastname)? $lastname:""; ?>"></td></tr>
        <tr><td>Α.Μ.Κ.Α:</td><td><input type="text" value="<?php echo isset($amka)? $amka:""; ?>"></td></tr>
        <tr><td>Α.Φ.Μ:</td><td><input type="text" value="<?php echo isset($afm)? $afm:""; ?>"></td></tr>
        <tr><td>Αριθμός Ταυτ.:</td><td><input type="text" value="<?php echo isset($artaftotitas)? $artaftotitas:""; ?>"></td></tr>
        <tr><td>Ηλικία:</td><td><input type="text" value="<?php echo isset($age)? $age:""; ?>"></td></tr>
        <tr><td>Φύλλο:</td><td><input type="text" value="<?php echo isset($gender)? $gender:""; ?>"></td></tr>
        <tr><td>Email:</td><td><input type="text" value="<?php echo isset($email)? $email:""; ?>"></td></tr>
        <tr><td>Κινητό Τηλ.:</td><td><input type="text" value="<?php echo isset($mobilephone)? $mobilephone:""; ?>"></td></tr>
    </table>
</form>


</table>