<form action="ledenadministratie.php?page=contributieoverzicht" method="post" class="crud">
    <h3>Aanpassen: Voeg de nieuwe waarden in voor de bestaande contributie</h3>
    <input type="number" name="contribution_id" placeholder="Contributie nummer" required autofocus>
    <input type="number" name="member_id" placeholder="Lid nummer" required>
    <select name="year_id" required>
        <?php 
            foreach($years as $year) {
                $year = $year['year_id'];
                echo "<option value='$year'>$year</option>";
            }
        ?>
    </select>
    <input type="submit" name="updateContribution" value="Aanpassen">
</form>