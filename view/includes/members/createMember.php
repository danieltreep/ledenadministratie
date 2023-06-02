<form action="ledenadministratie.php?page=ledenoverzicht" method="post" class="crud">
    <h3>Toevoegen: Voeg de waarden in om een nieuw lid toe te voegen</h3>
    <input type="text" name="name" placeholder="Voornaam" required autofocus>
    <select name="family_id" required>
        <option disabled selected value=''>Familienaam</option>
        <?php 
            foreach($families as $family) {
                $family_id = $family['family_id'];
                $surname = $family['surname'];
                echo "<option value='$family_id'>$family_id: $surname</option>";
            }
        ?>
    </select>
    <input type="date" name="birthday" max="2023-01-01" required>
    <input type="submit" name="createMember" value="Toevoegen">
</form>