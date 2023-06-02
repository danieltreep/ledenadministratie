<?php    
    class MemberModel {

        // Functie die alle leden ophaalt met gegevens over welke groep en familie
        public function getMembers($pdo) {
            $query = "SELECT * FROM members NATURAL JOIN age_groups 
                NATURAL JOIN families
                ORDER BY member_id";
            $result = $pdo->query($query);
            return $result->fetchAll();
        }

        // Functie een lid maakt en toevoegd aan groep op basis van de leeftijd
        public function createMember($pdo) {
            $name = htmlspecialchars($_POST['name']);
            $birthday = htmlspecialchars($_POST['birthday']);
            $family_id = htmlspecialchars($_POST['family_id']);

            $currentDate = date('Y-m-d');
            $age = getAge($currentDate, $birthday); // Functie in de controller die het verschil in jaren returned
            $group_id = getGroup($age);             // Functie die het lid op basis van de leeftijd indeelt in een groep
            
            $query = "INSERT INTO members VALUES(NULL, '$name', '$birthday', '$group_id', '$family_id')";
            $result = $pdo->query($query);  
            $_POST = array();
        }

        // Functie die een lid verwijderd op basis van het lid nummer
        public function deleteMember($pdo) {
            $member_id = $_POST['member_id'];
            $query = "DELETE FROM members WHERE member_id='$member_id'";
            $result = $pdo->query($query);  
            $_POST = array();
        }

        // Functie een lid update met de ingevoerde waarden
        public function updateMember($pdo) {
            $member_id = htmlspecialchars($_POST['member_id']);
            $name = htmlspecialchars($_POST['name']);
            $birthday = htmlspecialchars($_POST['birthday']);
            $family_id = htmlspecialchars($_POST['family_id']);

            $currentDate = date('Y-m-d');
            $age = getAge($currentDate, $birthday); // Functie in de controller die het verschil in jaren returned
            $group_id = getGroup($age);             // Functie die het lid op basis van de leeftijd indeelt in een groep
            
            $query = "UPDATE members 
                SET name='$name', birthday='$birthday', group_id='$group_id', family_id='$family_id' 
                WHERE members.member_id='$member_id'";
            $result = $pdo->query($query);  
            $_POST = array();
        }

        // Functie die informatie laat zien van de gezochte gebruiker
        public function searchMember($pdo) {
            $member_id = htmlspecialchars($_POST['member_id']);
            $query = "SELECT members.member_id, name, surname, adress, birthday, group_name, discount, sum(amount) AS total, count(contribution_id) AS count
                FROM members 
                NATURAL JOIN age_groups 
                NATURAL JOIN families
                LEFT JOIN contributions ON members.member_id=contributions.member_id
                WHERE members.member_id='$member_id'
                GROUP BY members.member_id";
            $result = $pdo->query($query); 
            return $result->fetchAll(); 
        }
    }
?>