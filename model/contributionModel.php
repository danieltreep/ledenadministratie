<?php    
    class ContributionModel {

        // Functie die alle nuttige informatie laat zien van de contributies, zoals voor wie het was, welk jaar en welke groep
        public function getContributions($pdo) {
            $query = "SELECT contribution_id, name, members.member_id, surname, group_name, amount, year_id, birthday, age FROM contributions 
                LEFT JOIN members ON contributions.member_id=members.member_id 
                LEFT JOIN age_groups ON contributions.group_id=age_groups.group_id
                NATURAL JOIN booking_years
                NATURAL JOIN families
                ORDER BY contribution_id";
            $result = $pdo->query($query);
            return $result->fetchAll();
        }

        // Functie die alle jaren retourneert. Wordt gebruikt in de <select> bij de contributies
        public function getYears($pdo) {
            $query = "SELECT * FROM booking_years ORDER BY year_id DESC";
            $result = $pdo->query($query);
            return $result->fetchAll();
        }

        // Functie voor het creeren en updaten van een contributie
        public function createUpdateContribution($pdo) {
            $member_id = htmlspecialchars($_POST['member_id']); // Het geselecteerde lid nummer   
            $year = htmlspecialchars($_POST['year_id']);        // Het geselecteerde jaar
            
            // Eerst haal ik de geboortedatum op van het gekozen lid
            $query = "SELECT birthday FROM members WHERE member_id='$member_id'";
            $result = $pdo->query($query);
            $birthday = $result->fetch();
            
            // Met geboortedatum roep ik de functie getAge() aan om de leeftijd te bepalen van het lid in het boekingsjaar
            $bookingYear = htmlspecialchars($year) . '-1-1';    // Formateer het jaar naar YYYY-MM-DD zodat de functie getAge() in de controller het kan gebruiken
            $age = getAge($bookingYear, $birthday['birthday']);
            $group_id = getGroup($age);                         // Met de leeftijd bepaal ik in welke groep het lid toen zat
            
            // Selecteer de korting van de groep waar het lid toen bij behoorde
            $query = "SELECT discount FROM age_groups WHERE group_id='$group_id'";
            $result = $pdo->query($query);
            $discount = $result->fetch();
            $amount = 100 - $discount['discount'];              // De contributie is standaard bedrag - de korting
            
            // Bepaal of de contributie wordt aangepast of gecreerd door de waarde van de geklikte button
            if (isset($_POST['createContribution'])) {
                $query = "INSERT INTO contributions VALUES(NULL, '$age', '$group_id', '$amount', '$year', '$member_id')";
            } else if (isset($_POST['updateContribution'])) {
                $contribution_id = $_POST['contribution_id'];

                $query = "UPDATE contributions 
                SET age='$age', member_id='$member_id', amount='$amount', year_id='$year', group_id='$group_id'
                WHERE contributions.contribution_id='$contribution_id'";
            }
            
            $result = $pdo->query($query);                      // Voer een van bovenstaande acties uit op de database
            $_POST = array();
        }

        // Functie om een contributie te verwijderen
        public function deleteContribution($pdo) {
            $contribution_id = htmlspecialchars($_POST['contribution_id']);

            $query = "DELETE FROM contributions WHERE contribution_id='$contribution_id'";
            $result = $pdo->query($query);  
            $_POST = array();
        }

        // Functie laat per jaar zien hoeveel contributie er betaald is
        public function getYearlyOverview($pdo) {
            $query = "SELECT booking_years.year_id, sum(amount) AS amount, COUNT(member_id) AS count
                FROM booking_years 
                LEFT JOIN contributions ON booking_years.year_id=contributions.year_id 
                GROUP BY booking_years.year_id";
            $result = $pdo->query($query);
            return $result->fetchAll();
        }
    }
?>