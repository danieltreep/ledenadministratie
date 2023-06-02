<h2>Familieoverzicht</h2>
<?php 
    // Laat alleen de CRUD opties zien als er door de admin is ingelogd
    if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin') {
        echo <<<END
            <form action="ledenadministratie.php?page=familieoverzicht" method="post">
                <input type="submit" name="createFamilies" value="Toevoegen">
                <input type="submit" name="updateFamilies" value="Aanpassen">
                <input type="submit" name="deleteFamilies" value="Verwijder">
            </form>
        END;
    }
?>
<table>
    <thead>
        <tr>
            <th>Fam. nr.</th>
            <th>Familienaam</th>
            <th>Familieleden</th>
            <th>Aantal</th>
            <th>Contributie</th>
            <th>Adres</th>
        </tr>
    </thead>
    <tbody>
        <?php
            // Loop over de families array en laat een rij zien met daarin de informatie
            foreach ($families as $family) {
                $id = htmlspecialchars($family['family_id']);
                $naam = htmlspecialchars($family['surname']);
                $familyMembers = htmlspecialchars($family['names']);
                $count = htmlspecialchars($family['count']);
                $contribution = $family['discount'] >= '0' ? (100 * $count) - htmlspecialchars($family['discount']) : '0'; // Als er geen leden zijn laat 0 zien
                $adres = htmlspecialchars($family['adress']);
                
                echo <<<END
                    <tr>
                        <td>$id</td>
                        <td>$naam</td>
                        <td>$familyMembers</td>
                        <td>$count</td>
                        <td>&euro; $contribution</td>
                        <td>$adres</td>
                    </tr>
                END;
            }
        ?>
    </tbody>
</table>  