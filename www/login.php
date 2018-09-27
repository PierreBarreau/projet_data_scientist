<?php
 session_start (); // on démarre la session
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>Page de connexion</title>
    </head>
    <body>
        <header> Page de connexion </header>
         <!--formulaire qui envoie les information vers le script d'authentification : login et mdp-->
        <form method="post" action="connect.php">
            <fieldset>
            <input type="text" name="login" placeholder="N° SESAME"/> <br/> 
            <input type="password" name="mdp" placeholder="Mot de passe" /> <br/>
            <br/>
            <input type="submit" value="Valider" class="btn btn-input" />    
            </fieldset>   
        </form> 
    </body>
</html>