<?php    
    class FamilyModel {

        // Functie die de families ophaalt met de familieleden en het huidige totale contributie aantal laat zien
        public function getFamilies($pdo) {
            $query = "SELECT families.family_id, surname, adress, COUNT(members.family_id) AS count, GROUP_CONCAT(concat(' ',name)) AS names, SUM(discount) AS discount 
                FROM families LEFT JOIN members ON families.family_id=members.family_id 
                LEFT JOIN age_groups ON members.group_id=age_groups.group_id
                GROUP BY family_id";
            $result = $pdo->query($query);
            return $result->fetchAll();
        }

        // Functie die een familie toevoegd
        public function createFamily($pdo) {
            $family_name = htmlspecialchars($_POST['surname']);             // Achternaam van de familie
            $adress = htmlspecialchars($_POST['adress']);                   // Adres van de familie
            
            $query = "INSERT INTO families VALUES(NULL, '$family_name', '$adress')";
            $result = $pdo->query($query);  
            $_POST = array();
        }

        // Functie die een familie verwijderd
        public function deleteFamily($pdo) {
            $family_id = htmlspecialchars($_POST['family_id']);             // ID van de familie

            $query = "DELETE FROM families WHERE family_id='$family_id'";
            $result = $pdo->query($query);  
            $_POST = array();
        }

        // Functie die een familie update
        public function updateFamily($pdo) {
            $family_id = htmlspecialchars($_POST['family_id']);             // ID van de familie
            $family_name = htmlspecialchars($_POST['surname']);             // Naam van de familie
            $adress = htmlspecialchars($_POST['adress']);                   // Adres van de familie
            
            $query = "UPDATE families 
                SET surname='$family_name', adress='$adress' 
                WHERE families.family_id='$family_id'";
            $result = $pdo->query($query);  
            $_POST = array();
        }
    }
?>