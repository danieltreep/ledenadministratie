<form action="ledenadministratie.php?page=familieoverzicht" method="post" class="crud">
    <h3>WAARSCHUWING. Verwijder alleen een familie als er geen leden meer zijn van die familie</h3>
    <h3>Verwijder een familie door het familie nummer in te voeren</h3>
    <input type="number" min='1' name="family_id" placeholder="Familie nummer" required autofocus>
    <input type="submit" name="deleteFamily" value="Verwijderen">
</form>