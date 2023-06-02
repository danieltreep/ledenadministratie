<form action="ledenadministratie.php?page=groepenoverzicht" method="post" class="crud">
    <h3>Aanpassen: Selecteer de oude groep en kies een nieuwe naam en omschrijving</h3>
    <select name="group_id" required>
        <option selected disabled value=''>Groep</option>
        <?php 
            foreach($groups as $group) {
                $group_id = $group['group_id'];
                $group_name = $group['group_name'];
                echo "<option value='$group_id'>$group_name</option>";
            }
        ?>
    </select>
    <input type="text" name="group_name" placeholder="Groepsnaam" required>
    <input type="text" name="group_description" placeholder="Omschrijving" required>
    <input type="number" name="discount" placeholder="Korting" min="0" max="100" required>
    <input type="submit" name="updateGroup" value="Aanpassen">
</form>