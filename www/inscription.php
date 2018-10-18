<!DOCTYPE html>
<html>
<head>
   
   
    <title>INSCRIPTION</title>
   
    <link href="connection.css" rel="stylesheet"/>
    <meta charset="utf-8">
   
</head>
<body>
   
<h1>Inscription<h1>

	  
     <?php
     $rang = 4; //rang par défaut 
      include('conection_bdd.php');
if (isset($_POST['prenom']))        //On regarde si l'utilisateur a déjà rempli le formulaire, si oui on fait des tests pour voir si les données peuvent être envoyées
{
   /* on test si les champ sont bien remplis */
    if(!empty($_POST['nom']) and !empty($_POST['prenom']) and !empty($_POST['mail']) and !empty($_POST['password']) and !empty($_POST['reppassword']))
    {
        /* on test si le mdp contient bien au moins 6 caractère */
        if (strlen($_POST['password'])>=6)
        {
            /* on test si les deux mdp sont bien identique */
            if ($_POST['password']==$_POST['reppassword'])
            {
                // On crypte le mot de passe
                $_POST['password']= md5($_POST['password']);
                // on prepare la requete et on envoie
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $mail = $_POST['mail'];
                $pass = $_POST['password'];
                //on prepare une requête et on envoie
                $req = $bdd->prepare('INSERT INTO compte (nom, prenom, mail, rang, mot_de_passe) VALUES(:nom, :prenom, :mail, :rang, :mot_de_passe)');

                $req->execute(array(

                    'nom' => $nom,

                    'prenom' => $prenom,

                    'mail' => $mail,

                    'rang' => $rang,

                    'mot_de_passe' => $pass,

                    ));
                /* execute et affiche l'erreur mysql si elle se produit */
                $requete = "SELECT EXIST(SELECT mail FROM 'compte' WHERE mail = ".$mail.")";
                $repp = $bdd->query($requete);
                if($mail == $repp)
                {
                    printf("Vous avez bien été ajouté à la base de donnée.");
                    printf("Veuillez vous connexter.");
                    printf("<ul><li><a href=\"index.php\">Connexion</a></li></ul>");
                }
                else{
                    //si l'ajout n'a pas fonctionné on demande de réessayer plus tard
                    printf("Nous n'avons pas réussi à vous ajouter à la base de donnée. Veuillez réessayez plus tard. Si cette erreur se répète veuillez en informer le groupe de projet.");
                    printf("Message d'erreur : %s\n", $bdd->error);
                }
            }
            else echo "Les mots de passe ne sont pas identiques";
            ?>
            <form method="post" action="inscription.php">
            <fieldset>
            <legend>Inscription</legend>
            <p>
                <label for="nom">Nom :</label><input name="nom" type="text"/><br/><br>
                <label for="prenom">Prénom :</label><input name="prenom" type="text"/><br/><br>
                <label for="mail">Adresse mail :</label><input name="mail" type="email"/><br/><br>
                <label for="password">Mot de Passe :</label><input type="password" name="password"/><br/><br>
                <label for="reppassword">Répeter mot de passe:</label><input type="password" name="reppassword"/><br/><br>
            </p>
            </fieldset>
            <p><input type="submit" value="Valider" /></p></form>  
        </form> 
            <?php
        }
        else echo "Le mot de passe est trop court !";
        ?>
            <form method="post" action="inscription.php">
            <fieldset>
            <legend>Inscription</legend>
            <p>
                <label for="nom">Nom :</label><input name="nom" type="text"/><br/><br>
                <label for="prenom">Prénom :</label><input name="prenom" type="text"/><br/><br>
                <label for="mail">Adresse mail :</label><input name="mail" type="email"/><br/><br>
                <label for="password">Mot de Passe :</label><input type="password" name="password"/><br/><br>
                <label for="reppassword">Répeter mot de passe:</label><input type="password" name="reppassword"/><br/><br>
            </p>
            </fieldset>
            <p><input type="submit" value="Valider" /></p></form>  
        </form> 
            <?php
    }
    else echo "Veuillez saisir tous les champs !";
    ?>
            <form method="post" action="inscription.php">
            <fieldset>
            <legend>Inscription</legend>
            <p>
                <label for="nom">Nom :</label><input name="nom" type="text"/><br/><br>
                <label for="prenom">Prénom :</label><input name="prenom" type="text"/><br/><br>
                <label for="mail">Adresse mail :</label><input name="mail" type="email"/><br/><br>
                <label for="password">Mot de Passe :</label><input type="password" name="password"/><br/><br>
                <label for="reppassword">Répeter mot de passe:</label><input type="password" name="reppassword"/><br/><br>
            </p>
            </fieldset>
            <p><input type="submit" value="Valider" /></p></form>  
        </form> 
            <?php
}
else{
    ?>
<form method="post" action="inscription.php">
            <fieldset>
            <legend>Inscription</legend>
            <p>
                <label for="nom">Nom :</label><input name="nom" type="text"/><br/><br>
                <label for="prenom">Prénom :</label><input name="prenom" type="text"/><br/><br>
                <label for="mail">Adresse mail :</label><input name="mail" type="email"/><br/><br>
                <label for="password">Mot de Passe :</label><input type="password" name="password"/><br/><br>
                <label for="reppassword">Répeter mot de passe:</label><input type="password" name="reppassword"/><br/><br>
            </p>
            </fieldset>
            <p><input type="submit" value="Valider" /></p></form>  
        </form> 
    <?php
}
?>
</body>
</html>