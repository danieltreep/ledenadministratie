<?php
    include_once("model/memberModel.php");
    include_once("model/familyModel.php");
    include_once("model/groupModel.php");
    include_once("model/loginModel.php");
    include_once("model/contributionModel.php");
    session_start();    // Start een sessie
    
    class Controller {

        // Declareer klasse variabelen
        public $memberModel;
        public $familyModel;
        public $groupModel;
        public $loginModel;
        public $contributionModel;
        public $page;
        
        // Initieer variabelen als Object, hierna kunnen de functies daarvan worden aangeroepen
        public function __construct() {
            $this->memberModel = new MemberModel();
            $this->familyModel = new FamilyModel();
            $this->groupModel = new GroupModel();
            $this->loginModel = new LoginModel();
            $this->contributionModel = new ContributionModel();
            $this->page = isset($_GET['page']) ? $_GET['page'] : null; // Als de gebruikers op de links klikt komt dat in de GET array, is hij leeg blijft het null om een error te voorkomen
        }

        public function invoke($pdo) {

            // Start van de HTML, laat header, nav en content container zien
            include 'view/html_start.php';

            // Als de gebruiker inlogt of uitlogt wordt de juiste functie aangeroepen van het loginModel
            if (isset($_POST['login'])) {
                $_SESSION['loggedin'] = $this->loginModel->loginUser($pdo);     // Sla op of de gebruiker is ingelogd en laat hiermee andere header zien
            } else if (isset($_POST['register'])) {
                $this->loginModel->registerUser($pdo); 
            } else if (isset($_POST['logout'])) {
                session_destroy();                          // Stop de sessie
                header("Refresh:0");                        // Herlaad de pagina zodat de gebruiker weer op het startscherm komt
            } else if (isset($_POST['deleteProfile'])) {
                $this->loginModel->deleteUser($pdo);
            }

            // Roep functies aan van het gebruiker Model op basis van welke knop wordt ingedrukt
            if (isset($_POST['createMember'])) {
                $this->memberModel->createMember($pdo); 
            } else if (isset($_POST['deleteMember'])) {
                $this->memberModel->deleteMember($pdo); 
            } else if (isset($_POST['updateMember'])) {
                $this->memberModel->updateMember($pdo); 
            } else if (isset($_POST['searchMember'])) {
                $_SESSION['individualMember'] = $this->memberModel->searchMember($pdo); 
            }

            // Roep functies aan van het familie Model op basis van welke knop wordt ingedrukt
            if (isset($_POST['createFamily'])) {
                $this->familyModel->createFamily($pdo); 
            } else if (isset($_POST['deleteFamily'])) {
                $this->familyModel->deleteFamily($pdo); 
            } else if (isset($_POST['updateFamily'])) {
                $this->familyModel->updateFamily($pdo); 
            }

            // Roep functies aan van het groepen Model op basis van welke knop wordt ingedrukt
            if (isset($_POST['createGroup'])) {
                $this->groupModel->createGroup($pdo); 
            } else if (isset($_POST['deleteGroup'])) {
                $this->groupModel->deleteGroup($pdo); 
            } else if (isset($_POST['updateGroup'])) {
                $this->groupModel->updateGroup($pdo); 
            }

            // Roep functies aan van het contributie Model op basis van welke knop wordt ingedrukt
            if (isset($_POST['createContribution']) || isset($_POST['updateContribution'])) {
                $this->contributionModel->createUpdateContribution($pdo); 
            } else if (isset($_POST['deleteContribution'])) {
                $this->contributionModel->deleteContribution($pdo); 
            }

            // Roep de functies op van de Models en sla de waarden op uit de database als arrays  
            $families = $this->familyModel->getFamilies($pdo);                      // Alle informatie over families
            $members = $this->memberModel->getMembers($pdo);                        // Alle informatie over leden
            $groups = $this->groupModel->getGroups($pdo);                           // Alle informatie over groepen
            $contributions = $this->contributionModel->getContributions($pdo);      // Alle informatie over contributies
            $years = $this->contributionModel->getYears($pdo);                      // Alle boekjaren
            $yearlyOverview = $this->contributionModel->getYearlyOverview($pdo);    // Alle informatie van elk jaar

            // Op basis van welke waarde de $page variabele heeft wordt de juiste pagina getoont
            switch($this->page) {
                case 'familieoverzicht':                    
                    include_once 'view/paginas/familieoverzicht.php';
                    break;
                case 'ledenoverzicht':
                    include_once 'view/paginas/ledenoverzicht.php';
                    break;
                case 'groepenoverzicht':                    
                    include_once 'view/paginas/groepenoverzicht.php';
                    break;
                case 'contributieoverzicht':                    
                    include_once 'view/paginas/contributieoverzicht.php';
                    break;
                case 'jaaroverzicht':                    
                    include_once 'view/paginas/jaaroverzicht.php';
                    break;
                case 'profiel':                    
                    include_once 'view/paginas/profiel.php';
                    break;
            }

            // Laat de gekozen CRUD popup zien voor de leden
            if (isset($_POST['createMembers'])) {
                include 'view/includes/members/createMember.php';
            } else if (isset($_POST['deleteMembers'])) {
                include 'view/includes/members/deleteMember.php';
            } else if (isset($_POST['updateMembers'])) {
                include 'view/includes/members/updateMember.php';
            }

            // Laat de gekozen CRUD popup zien voor de families
            if (isset($_POST['createFamilies'])) {
                include 'view/includes/families/createFamily.php';
            } else if (isset($_POST['deleteFamilies'])) {
                include 'view/includes/families/deleteFamily.php';
            } else if (isset($_POST['updateFamilies'])) {
                include 'view/includes/families/updateFamily.php';
            }
            
            // Laat de gekozen CRUD popup zien voor de groepen
            if (isset($_POST['createGroups'])) {
                include 'view/includes/groups/createGroup.php';
            } else if (isset($_POST['deleteGroups'])) {
                include 'view/includes/groups/deleteGroup.php';
            } else if (isset($_POST['updateGroups'])) {
                include 'view/includes/groups/updateGroup.php';
            }

            // Laat de gekozen CRUD popup zien voor de contributies
            if (isset($_POST['createContributions'])) {
                include 'view/includes/contributions/createContribution.php';
            } else if (isset($_POST['deleteContributions'])) {
                include 'view/includes/contributions/deleteContribution.php';
            } else if (isset($_POST['updateContributions'])) {
                include 'view/includes/contributions/updateContribution.php';
            }
            
            // Laat footer zien, sluit de HTML
            include_once 'view/html_end.php';
        }
    }

    // Return het verschil in jaren tussen de twee verschillende data
    function getAge($date1, $birthday) {

        $date1 = new DateTime($date1);
        $birthday = new DateTime($birthday);
        $difference = $date1->diff($birthday);
    
        return $difference->y;
    }
    
    // Return group_id op basis van de leeftijd
    function getGroup($age) {
        switch($age) {
            case $age < 8: 
                return 1;
            case $age < 13: 
                return 2;
            case $age < 18: 
                return 3;
            case $age <= 50: 
                return 4;
            case $age > 50: 
                return 5;
        }
    }
?>