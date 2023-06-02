<form action="ledenadministratie.php?page=familieoverzicht" method="post" class="crud">
    <h3>Aanpassen: Voeg de nieuwe waarden in voor de bestaande familie</h3>
    <input type="number" name="family_id" placeholder="Familie nummer" required autofocus>
    <input type="text" name="surname" placeholder="Familienaam" required>
    <input type="tex" name="adress" placeholder="Adres" required>
    <input type="submit" name="updateFamily" value="Aanpassen">
</form>