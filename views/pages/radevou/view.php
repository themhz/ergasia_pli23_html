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