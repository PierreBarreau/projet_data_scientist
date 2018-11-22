<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
 		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 		<meta http-equiv="Content-Language" content="fr" />
	 	<title>
  			DSP
		</title>
		<link href="General.css" rel="stylesheet"/>
	</head>
	<body>
		<?php
		echo "<h1>";
		echo $_SESSION['id'];
		echo "</h1>";
		?>
		<br><br>
		<?php
    if(!isset($_POST['ancien'])){
      //Si le formulaire n'a pas été rempli
      ?>
      <form method="post" action="compte.php">
            <fieldset>
            <legend>Changer de mot de passe :</legend>
            <p>
                <label for="ancien">Ancien :</label><input name="ancien" type="password"/><br/><br>
                <label for="nouveau1">Nouveau :</label><input name="nouveau1" type="password"/><br/><br>
                <label for="nouveau2">Répèter nouveau :</label><input name="nouveau2" type="password"/><br/><br>
            </p>
            </fieldset>
            <p><input type="submit" value="Valider" /></p></form>
            <?php
    }
    else{
      //si la personne a rempli le formulaire
      include('conection_bdd.php');
      //POUR LE DEBUG SI DE NOUVEAUX PB:echo "Avant le chiffrement : ". $_POST['ancien']."<br>".$_POST['nouveau1']."<br>".$_POST['nouveau2']."<br>Mail:".$_SESSION['mail'];
        $lastpsswd=md5($_POST['ancien']);
        $new1=md5($_POST['nouveau1']);
        $new2=md5($_POST['nouveau2']);
        //POUR LE DEBUG SI DE NOUVEAUX PB:echo "<br><br>Après le chiffrement: ".$lastpsswd."<br>".$new1."<br>".$new2."<br>";
        $mail=$_SESSION['mail'];
        $req = $bdd->prepare('SELECT mot_de_passe FROM compte WHERE mail = :mail');
        $req->execute(array(
          'mail' => $_SESSION['mail']));
        $resultat = $req->fetch();
        $ancienmdp=$resultat['mot_de_passe'];
        //POUR LE DEBUG SI DE NOUVEAUX PB:echo "Ancien mdp: ".$ancienmdp;
        if (empty($new1)||empty($new2)||empty($lastpsswd)) {
          ?>
          <p>Vous avez  oublié de remplir un champ.<br><br></p>
            <form method="post" action="compte.php">
            <fieldset>
            <legend>Changer de mot de passe :</legend>
            <p>
                <label for="ancien">Ancien :</label><input name="ancien" type="password"/><br/><br>
                <label for="nouveau1">Nouveau :</label><input name="nouveau1" type="password"/><br/><br>
                <label for="nouveau2">Répèter nouveau :</label><input name="nouveau2" type="password"/><br/><br>
            </p>
            </fieldset>
            <p><input type="submit" value="Valider" /></p></form>
            <?php
        }
        else{
          $un=strcmp($new1, $new2);
          if ($un!=0) {
            ?>
            <p>Les nouveaux mots de passe ne sont pas les mêmes.<p><br><br>
            <form method="post" action="compte.php">
            <fieldset>
            <legend>Changer de mot de passe :</legend>
            <p>
                <label for="ancien">Ancien :</label><input name="ancien" type="password"/><br/><br>
                <label for="nouveau1">Nouveau :</label><input name="nouveau1" type="password"/><br/><br>
                <label for="nouveau2">Répèter nouveau :</label><input name="nouveau2" type="password"/><br/><br>
            </p>
            </fieldset>
            <p><input type="submit" value="Valider" /></p></form>
            <?php
          }
          else{
            $deux=strcmp($lastpsswd, $ancienmdp);
            if ($deux!=0) {
              ?>
              <p>Votre ancien mot de passe ne correspond pas</p><br><br>
              <form method="post" action="compte.php">
            <fieldset>
            <legend>Changer de mot de passe :</legend>
            <p>
                <label for="ancien">Ancien :</label><input name="ancien" type="password"/><br/><br>
                <label for="nouveau1">Nouveau :</label><input name="nouveau1" type="password"/><br/><br>
                <label for="nouveau2">Répèter nouveau :</label><input name="nouveau2" type="password"/><br/><br>
            </p>
            </fieldset>
            <p><input type="submit" value="Valider" /></p></form>
            <?php
            }
            else{
              echo "<p>Le mot de passe est en train d'être changé.</p>";
              $req2 = $bdd->prepare('UPDATE compte SET mot_de_passe = :nvmot_de_passe WHERE mail = :mail');
              $req2 -> execute(array(
                'nvmot_de_passe' => $new2,
                'mail' => $mail));
              echo "<p>Le mot de passe a bien été changé : </p>";
            }
          }
        }
    }
		?>
		<br><br>
    <?php
      if ($_SESSION['rang']==1) {
        ?>
        <p>Pour modifier les droits des utilisateurs du site cliquez sur le lien suivant:</p>
        <a href="gestion_user.php">gestion</a>
        <?php
      }
    ?>
		<p>Se déconnecter en cliquant sur le lien suivant: </p>
		<a href="deconnexion.php">deconnexion</a>
	</body>
</html>