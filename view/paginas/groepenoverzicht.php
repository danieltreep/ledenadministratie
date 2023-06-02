<h2>Groepenoverzicht</h2>
<?php 
    // Laat alleen de CRUD opties zien als er door de admin is ingelogd
    if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin') {
        echo <<<END
            <form action="ledenadministratie.php?page=groepenoverzicht" method="post">
                <input type="submit" name="createGroups" value="Toevoegen">
                <input type="submit" name="updateGroups" value="Aanpassen">
                <input type="submit" name="deleteGroups" value="Verwijder">
            </form>
        END;
    }
?>
<table>
    <thead>
        <tr>
            <th>Groep ID</th>
            <th>Groep naam</th>
            <th>Omschrijving</th>
            <th>Korting</th>
        </tr>
    </thead>
    <tbody>
        <?php
            // Loop over de groepen array en laat een rij zien met daarin de informatie
            foreach ($groups as $group) {
                $group_id = htmlspecialchars($group['group_id']);
                $group_name = htmlspecialchars($group['group_name']);
                $description = htmlspecialchars($group['group_description']);
                $discount = htmlspecialchars($group['discount']);

                echo <<<END
                <tr>
                    <td>$group_id</td>
                    <td>$group_name</td>
                    <td>$description</td>
                    <td>$discount &#37;</td>
                </tr>
                END;
            }
        ?>
    </tbody>
</table>