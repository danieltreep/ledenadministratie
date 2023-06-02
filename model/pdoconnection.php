<!-- Maak connectie met de database -->
<?php
    $host = 'localhost';            // Standaard host, verander eventueel
    $data = 'ledenadministratie';   // Voer hier uw database naam in
    $user = 'root';                 // Voer hier uw mysql gebruikersnaam in
    $pass = 'mysql';                // Voer hier uw wachtwoord in
    $chrs = 'utf8mb4';
    $attr = "mysql:host=$host;dbname=$data;charset=$chrs";
    $opts = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    
    try {
        $pdo = new PDO($attr, $user, $pass, $opts);
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }
?>