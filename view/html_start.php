<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <title>Ledenadministratie</title>
</head>
<body>
    <header>
        <h1>Ledenadministratie</h1>
        <?php 
            // Als de gebruiker is ingelogd wordt hij verwelkomt, kan hij naar zijn profiel en kan weer uitloggen
            // Als er geen gebruiker is ingelogd heeft hij de mogelijkheid om dit te doen of te registreren
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

                $username = $_SESSION['username'];

                echo <<<END
                    <form class="logout" action="ledenadministratie.php?page=familieoverzicht" method="post">
                        <label>Welkom <i>$username</i></label>
                        <a href="ledenadministratie.php?page=profiel">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M19 7.001c0 3.865-3.134 7-7 7s-7-3.135-7-7c0-3.867 3.134-7.001 7-7.001s7 3.134 7 7.001zm-1.598 7.18c-1.506 1.137-3.374 1.82-5.402 1.82-2.03 0-3.899-.685-5.407-1.822-4.072 1.793-6.593 7.376-6.593 9.821h24c0-2.423-2.6-8.006-6.598-9.819z"/></svg>
                        </a>
                        <input type="submit" name="logout" value="Logout">
                    </form>
                END;
            } else {
                echo <<<END
                    <form class="login" action="ledenadministratie.php?page=familieoverzicht" method="post">
                        <input type="text" name="username" placeholder="Gebruikersnaam" required>
                        <input type="password" name="password" placeholder="Wachtwoord" required>
                        <input type="submit" value="Login" name="login">
                        <input type="submit" value="Registreer" name="register">
                    </form>
                END;    
            }
        ?>
    </header>
    
    <main>
        <!-- Navigatie met linkjes naar de verschillende paginas. De linkjes updaten de GET array, die vervolgens wordt gelezen door de controller en de $page variabele update -->
        <!-- Als de $page variabele overeenkomt met de pagina wordt de link actief gemaakt met een CSS class -->
        <nav> 
            <a href="ledenadministratie.php?page=familieoverzicht" <?php if( $this->page == 'familieoverzicht') echo 'class="active"'?>>Familieoverzicht</a>
            <a href="ledenadministratie.php?page=ledenoverzicht" <?php if( $this->page == 'ledenoverzicht') echo 'class="active"'?>>Ledenoverzicht</a>
            <a href="ledenadministratie.php?page=groepenoverzicht" <?php if( $this->page == 'groepenoverzicht') echo 'class="active"'?>>Groepenoverzicht</a>
            <a href="ledenadministratie.php?page=contributieoverzicht" <?php if( $this->page == 'contributieoverzicht') echo 'class="active"'?>>Contributies</a>
            <a href="ledenadministratie.php?page=jaaroverzicht" <?php if( $this->page == 'jaaroverzicht') echo 'class="active"'?>>Jaaroverzicht</a>
        </nav>
        <div class="content">