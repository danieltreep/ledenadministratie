<h2>Contributies</h2>
<?php 
    // Laat alleen de CRUD opties zien als er door de admin is ingelogd
    if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin') {
        echo <<<END
            <form action="ledenadministratie.php?page=contributieoverzicht" method="post">
                <input type="submit" name="createContributions" value="Toevoegen">
                <input type="submit" name="updateContributions" value="Aanpassen">
                <input type="submit" name="deleteContributions" value="Verwijder">
            </form>
        END;
    }
?>
<table>
    <thead>
        <tr>
            <th>Con. nr.</th>
            <th>Naam</th>
            <th>Achternaam</th>
            <th>Lid nr.</th>
            <th>Groep</th>
            <th>Leeftijd</th>
            <th>Hoeveelheid</th>
            <th>Boekjaar</th>
        </tr>
    </thead>
    <tbody>
        <?php
            // Loop over de contributie array en laat een rij zien met daarin de informatie
            foreach ($contributions as $contribution) {
                $id = htmlspecialchars($contribution['contribution_id']);
                $member_id = htmlspecialchars($contribution['member_id']);
                $name = htmlspecialchars($contribution['name']);
                $surname = htmlspecialchars($contribution['surname']);
                $group_name = htmlspecialchars($contribution['group_name']);
                $amount = htmlspecialchars($contribution['amount']);
                $year = htmlspecialchars($contribution['year_id']);
                $age = htmlspecialchars($contribution['age']);
                
                echo <<<END
                <tr>
                    <td>$id</td>
                    <td>$name</td>
                    <td>$surname</td>
                    <td>$member_id</td>
                    <td>$group_name</td>
                    <td>$age</td>
                    <td>&euro; $amount</td>
                    <td>$year</td>  
                </tr>
                END;
            }
        ?>
    </tbody>
</table>