<form action="ledenadministratie.php?page=contributieoverzicht" method="post" class="crud">
    <h3>Toevoegen: Voeg het lidnummer en het jaar toe om een contributie toe te voegen</h3>
    <input type="number" name="member_id" placeholder="Lid nummer" required autofocus>
    <select name="year_id" required >
        <?php 
            foreach($years as $year) {
                $year = $year['year_id'];
                echo "<option value='$year'>$year</option>";
            }
        ?>
    </select>
    <input type="submit" name="createContribution" value="Toevoegen">
</form>