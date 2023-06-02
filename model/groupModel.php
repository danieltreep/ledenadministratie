<?php    
    class GroupModel {

        // Funtie die alle groupen ophaalt 
        public function getGroups($pdo) {
            $query = "SELECT * FROM age_groups";
            $result = $pdo->query($query);
            return $result->fetchAll();
        }

        // Functie die een groep maakt
        public function createGroup($pdo) {

            $group_name = htmlspecialchars($_POST['group_name']);                   // De naam van de groep
            $group_description = htmlspecialchars($_POST['group_description']);     // De omschrijving van de groep
            $discount = htmlspecialchars($_POST['discount']);                       // Hoeveel korting heeft die groep

            $query = "INSERT INTO age_groups VALUES(NULL, '$group_name', '$group_description', $discount)";
            $result = $pdo->query($query);  
            $_POST = array();
        }

        // Functie die een groep verwijderd op basis van het groep nummer
        public function deleteGroup($pdo) {
            $group_id = htmlspecialchars($_POST['group_id']);                       // ID van de groep
            
            $query = "DELETE FROM age_groups WHERE group_id='$group_id'";
            $result = $pdo->query($query);  
            $_POST = array();
        }

        // Functie die een groep update met 
        public function updateGroup($pdo) {
            $group_id = htmlspecialchars($_POST['group_id']);                       // ID van de groep
            $group_name = htmlspecialchars($_POST['group_name']);                   // De naam van de groep
            $group_description = htmlspecialchars($_POST['group_description']);     // De omschrijving van de groep
            $discount = htmlspecialchars($_POST['discount']);                       // Hoeveel korting heeft die groep
            
            $query = "UPDATE age_groups 
                SET group_name='$group_name', group_description='$group_description', discount='$discount' 
                WHERE age_groups.group_id='$group_id'";
            $result = $pdo->query($query);  
            $_POST = array();
        }
    }
?>