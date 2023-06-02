<form action="ledenadministratie.php?page=groepenoverzicht" method="post" class="crud">
    <h3>Toevoegen: Voeg de naam in van de nieuwe groep</h3>
    <input type="text" name="group_name" placeholder="Groepsnaam" required autofocus>
    <input type="text" name="group_description" placeholder="Omschrijving" required>
    <input type="number" name="discount" placeholder="Korting" min="0" max="100" required>
    <input type="submit" name="createGroup" value="Toevoegen">
</form>