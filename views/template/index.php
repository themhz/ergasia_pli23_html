<!-- Δήλωση ότι πρόκειτε για html σελίδα στον browser -->
<!DOCTYPE html>
<!-- Έναρξη html σελίδας -->
<html>    
    <!-- Η κεφαλή της σελίδας -->
<head>
    <!-- Τα μετα δεδομένα για τον browser ότι η σελίδα που ακολουθεί είναι σε UTF8 κωδικοποίηση -->
    <meta charset="UTF-8">
    <!-- Τα μετα δεδομένα για τον browser να υποστιρίζει τον edge -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Τα μετα δεδομένα για να παίζει στο κινητό -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Αναφορά στο αρχείο css -->
    <link rel="stylesheet" href="views/template/style.css">
    <!-- Ο τίτλος της σελίδας -->
    <title>Πλατφόρμα εμβολιασμού</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
</head>

<!-- Έναρξη του σώματος της σελίδας -->
<body>    
    <!-- Εδώ δεν θα μπω σε λεπτομέρια. Θα αναφέρω ότι χρησιμποιώ css flexbox για την τοποθέτηση των δομικών στοιχείων της html -->
    <!-- Δομικά στοιχεία που χρησιμποιώ είναι το div ως πλαίσιο, το a για τους υπερσυνδέσμους και το ul,li ως λίστα -->
    <!-- Την ίδια δομή την χρησιμποιώ σε όλες τις σελίδες. Σε κάποιες απλά δηλώνει τα heading H1,H2 και H3 που ζητήτε καθώς και το P για τις παραγράφους -->
    <!-- Γίνετε επίσης χρήση μια φόρμας στην περίπτωση του Login για να ποστάρονται τα δεδομένα και τέλος κάποιων input δομών για χρήση κουμπιών.  -->
    <div class="header">
        <div class="left">
            <a href="?"><img src="views/template/logo.png"></a>
        </div>
        <div class="center">
            <h1>Πλατφόρμα εμβολιασμού</h1>
            <h2>Υπουργείο Υγείας</h2>
        </div>
        <div class="right">
            
                <?php if( $_SESSION["islogged"]==1){ ?>
                    <div class="login">
                        <a href="?page=eisodos_eggrafh&method=logout">Logout</a>
                    </div>
                <?php } else { ?>      
                    <div class="logout">              
                        <a href="?page=eisodos_eggrafh&method=eisodos_eggrafh">Login</a>
                    </div>
                <?php }?>
            
        </div>
    </div>
    <div class="main border-full">
        <div class="left border-right">
            <ul class="menu">
                <li id="home"><a href="?page=home&method=home">Αρχική σελίδα</a></li>
                <li id="emboliastika_kentra"><a href="?page=emboliastika_kentra&method=emboliastika_kentra">Εμβολιαστικά Κέντρα</a></li>
                <li id="odigies_mvoliasmou"><a href="?page=odigies_mvoliasmou&method=odigies_mvoliasmou">Οδηγίες εμβολιασμού</a></li>
                <li id="odigies_egrafis_isodou"><a href="?page=odigies_egrafis_isodou&method=odigies_egrafis_isodou">Οδηγίες εγγραφής/εισόδου</a></li>
                <li id="anakoinoseis"><a href="?page=anakoinoseis&method=anakoinoseis">Ανακοινώσεις</a></li>   

                <!-- 1 είναι πολίτης 2 είναι γιατρός -->
                <?php  if($_SESSION["user"]->role == "1")  {?>
                    <li id="radevou"><a href="?page=radevou&method=radevou">Ραντεβού</a></li>
                <?php } else {?>             
                    <li id="radevou_doctor"><a href="?page=radevou_doctor&method=radevou_doctor">Ραντεβού</a></li>
                <?php } ?>
                                
            </ul>
        </div>
        <div class="right">
        
        {{VIEW}}            
        </div>
    </div>
    <div class="footer">
        <a href="https://oreina.epidomata.gov.gr/Content/pdfs/terms-oreina.epidomata.gov.gr.pdf" target="_blank">Όροι χρήσης</a><div class="dash">|</div><a href="https://www.eap.gr/wp-content/uploads/2020/10/oroi-xr.pdf" target="_blank">Πολιτική απορρήτου</a>        
    </div>

    <script>
        document.addEventListener('readystatechange', function(evt) {
            if (evt.target.readyState == "complete") {
                <?php if(isset($_GET["page"]) && $_GET["page"]!="login") {?>
                    document.getElementById("<?php echo $_GET["page"] ?>").className = "active";
                <?php }?>
            }
        }, false);
    </script>
</body>
</html>