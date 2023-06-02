<form action="ledenadministratie.php?page=groepenoverzicht" method="post" class="crud">
    <h3>Verwijder een groep door de groep te kiezen</h3>
    <select name="group_id" required>
        <option selected disabled value=''>Groepsnaam</option>
        <?php 
            foreach($groups as $group) {
                $group_id = $group['group_id'];
                $group_name = $group['group_name'];
                echo "<option value='$group_id'>$group_name</option>";
            }
        ?>
    </select>
    <input type="submit" name="deleteGroup" value="Verwijderen">
</form>