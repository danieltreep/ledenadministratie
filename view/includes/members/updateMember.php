<form action="ledenadministratie.php?page=ledenoverzicht" method="post" class="crud">
    <h3>Aanpassen: Voeg de nieuwe waarden in voor het bestaande lidnummer</h3>
    <input type="number" name="member_id" placeholder="Lid nummer" required autofocus>
    <input type="text" name="name" placeholder="Voornaam" required>
    <select name="family_id" required>
        <option selected disabled value=''>Familienaam</option>
        <?php 
            foreach($families as $family) {
                $family_id = $family['family_id'];
                $surname = $family['surname'];
                echo "<option value='$family_id'>$family_id: $surname</option>";
            }
        ?>
    </select>
    <input type="date" name="birthday" max="2023-01-01" required>
    <input type="submit" name="updateMember" value="Aanpassen">
</form>