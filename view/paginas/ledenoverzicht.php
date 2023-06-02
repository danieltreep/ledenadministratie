<h2>Ledenoverzicht</h2>
<?php 
    // Laat alleen de CRUD opties zien als er door de admin is ingelogd
    if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin') {
        echo <<<END
            <form action="ledenadministratie.php?page=ledenoverzicht" method="post">
                <input type="submit" name="createMembers" value="Toevoegen">
                <input type="submit" name="updateMembers" value="Aanpassen">
                <input type="submit" name="deleteMembers" value="Verwijder">
            </form>
        END;
    }
?>
<table>
    <thead>
        <tr>
            <th>Lid nr.</th>
            <th>Voornaam</th>
            <th>Achternaam</th>
            <th>Adres</th>
            <th>Geboortedatum</th>
            <th>Groep</th>
            <th>Contributie</th>
        </tr>
    </thead>
    <tbody>
        <?php
            // Loop over de gebruikers array en laat een rij zien met daarin de informatie
            foreach ($members as $member) {
                $id = htmlspecialchars($member['member_id']);
                $naam = htmlspecialchars($member['name']);
                $surname = htmlspecialchars($member['surname']);
                $family_id = htmlspecialchars($member['family_id']);
                $adres = htmlspecialchars($member['adress']);
                $birthday = htmlspecialchars($member['birthday']);
                $group = htmlspecialchars($member['group_name']);
                $contribution = 100 - htmlspecialchars($member['discount']);
                
                echo <<<END
                <tr>
                    <td>$id</td>
                    <td>$naam</td>
                    <td>$surname</td>
                    <td>$adres</td>
                    <td>$birthday</td>
                    <td>$group</td>
                    <td>&euro; $contribution</td>
                </tr>
                END;
            }
        ?>
    </tbody>
</table>