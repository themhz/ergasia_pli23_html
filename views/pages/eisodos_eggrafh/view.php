<div class="box">
                <div class="box-l">
                    <form action="?page=eisodos_eggrafh&method=login" method="post">
                        <div class="login">
        
                            <h1>Είσοδος χρήστη</h1>
                            <p>
                                Παρακαλώ εισάγετε τον Α.Μ.Κ.Α και τον Α.Φ.Μ που δηλώσατε κατά την εγγραφή σας και πατήστε το κουμπί "Είσοδος"
                            </p>
                            <ul>
                                <li><label for="amka">Α.Μ.Κ.Α</label><input type="text" class="form-control" id="amka" name="amka" required></li>
                                <li><label for="afm">Α.Φ.Μ</label><input type="text" class="form-control" id="afm" name="afm" required></li>                                
                            </ul>
                            <input type="submit" value="Εϊσοδος/Εγγραφή" class="button"><br><br>
                            
                            Για την είσοδο σας θα πρέπει να έχει προηγηθεί η εγγραφή στην πλατφόρμα.
                        </div>
                    </form>
                </div>
                <div class="box-r">
                    <form action="?page=eisodos_eggrafh&method=register" method="post" >
                        <div class="register">
        
                            <h1>Οδηγίες εγγραφής στην πλατφόρμα</h1>
                            <p>
                                Για να εγγραφείτε στην πλατφόρμα θα πρέπει να συμπληρώσετε την παρακάτω φόρμα. Μετά την αποστολή των στοιχείων σας, θα σας σταλεί ένα επιβεβαιωτικό μήνυμα στο e-mail σας το οποίο θα πρέπει να διαβάσετε και να κάνετε κλικ στον σύνδεσμο της επιβεβαίωσης.
                                Τέλος θα έρθετε πάλι στην σελίδα μας και θα κάνετε σύνδεση με τα στοιχεία σας.
                            </p>
                            
                            <ul>
                                <li><label for="name">Όνομα</label><input type="text" class="form-control" id="name" name="name"
                                        required></li>
                                <li><label for="lastname">Επίθετο</label><input type="text" class="form-control" id="lastname"
                                        name="lastname" required></li>
                                <li><label for="amka">Α.Μ.Κ.Α</label><input type="text" class="form-control" id="amka"
                                        name="amka" required></li>
                                <li><label for="afm">Α.Φ.Μ</label><input type="text" class="form-control" id="afm" name="afm"
                                        required></li>
                                <li><label for="artaftotita">Αρ.Ταυτότητας</label><input type="text" class="form-control"
                                        id="artaftotita" name="artaftotita" required></li>
                                <li><label for="age">Ηλικία</label><input type="text" class="form-control" id="age" name="age"
                                        required></li>
                                <li><label for="age">Φύλο</label>                                    
                                    <select class="form-control" id="gender" name="gender">
                                        <option value="1">Αρέν</option>
                                        <option value="2">Θυλ</option>
                                    </select>
                                </li>
                                <li><label for="email">e-mail</label><input type="text" class="form-control" id="email"
                                        name="email"></li>
                                <li><label for="mobilephone">Κινητό τηλέφωνο</label><input type="text" class="form-control"
                                        id="mobilephone" name="mobilephone" required></li>
                                <li><label for="role">Ρόλος</label>                                    
                                    <select class="form-control" id="role" name="role">
                                        <option value="1">Πολίτης</option>
                                        <option value="2">Γιατρός</option>
                                    </select>
                                </li>
                            </ul>
                            <input type="submit" value="Εϊσοδος/Εγγραφή" class="button">
                            <input type="text" value="1" name="register" style="display:none;">
                        </div>
                    </form>
                </div>
            </div>             