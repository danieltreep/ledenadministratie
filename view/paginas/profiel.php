<h2>Mijn account - <?php echo $_SESSION['username'] ?></h2>

<!-- Hier kan een gebruiker worden gezocht -->
<form action="ledenadministratie.php?page=profiel" method="post">
    <p>Voer uw lidnummer in om uw gegevens in te zien</p>
    <input type="number" name="member_id" placeholder="Lidnummer" required> 
    <input type="submit" name="searchMember" value="Zoek">
</form>

<table>
    <thead>
        <tr>
            <th>Lid nr.</th>
            <th>Voornaam</th>
            <th>Achternaam</th>
            <th>Adres</th>
            <th>Geboortedatum</th>
            <th>Groep</th>
            <th>Huidige Contributie</th>
            <th>Aantal jaar lid</th>
            <th>Totaal betaald</th>
        </tr>
    </thead>
    <tbody>
        <?php
            // Als de sessie variabele aanwezig is laat de informatie zien van het gekozen lid 
            if (isset($_SESSION['individualMember'])) {
                foreach ($_SESSION['individualMember'] as $member) {
                    $id = htmlspecialchars($member['member_id']);
                    $naam = htmlspecialchars($member['name']);
                    $surname = htmlspecialchars($member['surname']);
                    $adres = htmlspecialchars($member['adress']);
                    $birthday = htmlspecialchars($member['birthday']);
                    $group = htmlspecialchars($member['group_name']);
                    $contribution = 100 - htmlspecialchars($member['discount']);
                    $total = htmlspecialchars($member['total']);
                    $count = htmlspecialchars($member['count']);
                    
                    echo <<<END
                    <tr>
                        <td>$id</td>
                        <td>$naam</td>
                        <td>$surname</td>
                        <td>$adres</td>
                        <td>$birthday</td>
                        <td>$group</td>
                        <td>&euro; $contribution</td>
                        <td>$count jaar</td>
                        <td>&euro; $total</td>
                    </tr>
                    END;
                }
            } 
        ?>
    </tbody>
</table>

<!-- Gedeelte waar een gebruiker zijn profiel kan verwijderen door het wachtwoord opnieuw in te voeren -->
<form action="ledenadministratie.php?page=profiel" method="post" class='deleteProfile'>
    <p>Voer uw wachtwoord in en klik op de button om uw account te verwijderen</p>
    <input type="password" name="password" placeholder='Wachtwoord' required>
    <input type="submit" name='deleteProfile' value='Verwijder account'>
</form>