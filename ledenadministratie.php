<?php
    // Alle interacties gaan meteen naar de controller.
    include_once("controller/controller.php");
    require_once("model/pdoconnection.php");
    $controller = new Controller();
    $controller->invoke($pdo);                  // Geef het PDO mee als argument
?>