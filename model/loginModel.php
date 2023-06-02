<?php    
    class LoginModel {

        // Functie die de gebruiker inlogt of een foutmelding geeft
        public function loginUser($pdo) {
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);
            
            // Zoek in de gebruikers of de gebruiker er is
            $query = "SELECT username, password FROM users WHERE username='$username'";
            $result = $pdo->query($query);

            // Als de gebruiker aanwezig is wordt er gekeken of het wachtwoord juist is 
            if ($user = $result->fetch()) {
                if (password_verify($password, $user['password'])) {
                    $_SESSION['username'] = $username;  // Als het wachtwoord juist is stel sessie variabele in met gebruikersnaam
                    header("Refresh:0");                // Herlaad de pagina zodat de juiste header wordt laten zien met logout en profiel
                    return true;                        // Return true naar de $_SESSION['loggedin'] variabele in de controller
                } else {
                    echo "<div class='melding fout'><p>Verkeerd wachtwoord</p></div>";  // Foutmelding als het wachtwoord niet klopt
                    return false;                       // Return false naar de $_SESSION['loggedin'] variabele in de controller
                }
            } else {
                echo "<div class='melding fout'><p>Er is geen gebruiker gevonden met gebruikersnaam: <i> $username </i> </p></div>"; // Er is geen gebruiker aanwezig met die naam
                return false;                           // Return false naar de $_SESSION['loggedin'] variabele in de controller
            }
        }

        // Functie die een gebruiker registreert
        public function registerUser($pdo) {
            $username = htmlspecialchars($_POST['username']);
            $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);  // Beveilig het wachtwoord

            $query = "SELECT username FROM users WHERE username='$username'";
            $result = $pdo->query($query);

            // Als de gebruikersnaam al in aanwezig is komt er een foutmelding, anders wordt de gebruiker geregistreerd
            if ($result->fetch()) {
                echo "<div class='melding fout'><p>Gebruikersnaam is al in gebruik</p></div>"; 
            } else if ($result->fetch() == null) {
                $query = "INSERT INTO users VALUES(NULL, '$username', '$password')";
                $result = $pdo->query($query);
                echo "<div class='melding goed'><p>U heeft gebruikersnaam <i>$username</i> geregistreerd. U kunt nu inloggen</p></div>";
            }
        }

        // Functie die een gebruiker verwijderd
        public function deleteUser($pdo) {
            $username = $_SESSION['username'];                  // Haal gebruikersnaam uit de sessie variabele
            $password = htmlspecialchars($_POST['password']);   

            // Haal de inloggevens op van de gebruiker
            $query = "SELECT user_id, username, password FROM users WHERE username='$username'";
            $result = $pdo->query($query);
            $user = $result->fetch();

            // Controleer of het juiste wachwoord is ingevoerd om de gebruiker te verwijderen
            if (password_verify($password, $user['password'])) {
                $user_id = $user['user_id'];
                $query = "DELETE FROM users WHERE user_id=$user_id";                    // Verwijder gebruiker uit de database
                $result = $pdo->query($query);
                session_destroy();                                                      // Stop de sessie
                header("Refresh:0 url=ledenadministratie.php?page=familieoverzicht");   // Herlaad de pagina zodat de gebruiker niet nog in de profielpagina zit
            } else {
                echo "<div class='melding fout'><p>Uw wachtwoord komt niet overeen</p></div>";  // Verkeer wachtwoord ingevoerd foutmelding
            } 
        }
    }
?>