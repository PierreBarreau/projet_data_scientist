<?php
 session_start (); // on démarre la session
 ?>
<!DOCTYPE html>
<html>
	<head>
 		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 		<meta http-equiv="Content-Language" content="fr" />
 		<link href="connection.css" rel="stylesheet"/>
	 	<title>
  			DSP
		</title>
	</head>
	<body>
		<?php
			if (!isset($_POST['mail'])) //On est dans la page de formulaire
				{
					echo '<h1>Connectez vous</h1><ul><li><a href="inscription.php">Inscription</a></li></ul>
					<br><br><form method="post" action="index.php">
					<fieldset>
					<legend>Connexion</legend>
					<p>
					<label for="mail">Adresse mail :</label><input name="mail" type="text" id="mail" /><br /><br>
					<label for="password">Mot de Passe :</label><input type="password" name="password" id="password" />
					</p>
					</fieldset>
					<p><input type="submit" value="Connexion" /></p>

				    </form> ';
				} 
				    else{
						    include('conection_bdd.php');
						    $mail=$_POST['mail'];
						    $pwd=$_POST['password'];	//on chiffre en md5 le mot de passe pour voir si il correspond à celui de la base
						    if (empty($mail) || empty($pwd)) //Oublie d\'un champ
						    {
						    	echo "Oublie d'un champ, veuillez remplir mail et mot de passe.";
						    	echo '<br><br><h1>Connectez vous</h1><ul><li><a href="inscription.php">Inscription</a></li></ul>
								<br><br><form method="post" action="index.php">
								<fieldset>
								<legend>Connexion</legend>
								<p>
								<label for="mail">Adresse mail :</label><input name="mail" type="text" id="mail" /><br /><br>
								<label for="password">Mot de Passe :</label><input type="password" name="password" id="password" />
								</p>
								</fieldset>
								<p><input type="submit" value="Connexion" /></p>
							    </form> ';
							}
							else{
								$pwd=md5($pwd);
								//  Récupération de l'utilisateur et de son pass hashé
								$req = $bdd->prepare('SELECT mail, mot_de_passe FROM compte WHERE mail = :mail');
								$req->execute(array(
								    'mail' => $mail));
								$resultat = $req->fetch();
								echo "Ce qui a été entré ";
								echo $pwd;
								echo " ce qui était dans la base de donnée ";
								echo $resultat['mot_de_passe'];
								$isPasswordCorrect = strcmp($pwd, $resultat['mot_de_passe']);
								if (!$resultat)
								{
								    echo '<p>Mauvais identifiant ou mot de passe !</p>';
								    echo '<br><br><h1>Connectez vous</h1><ul><li><a href="inscription.php">Inscription</a></li></ul>
									<br><br><form method="post" action="index.php">
									<fieldset>
									<legend>Connexion</legend>
									<p>
									<label for="mail">Adresse mail :</label><input name="mail" type="text" id="mail" /><br /><br>
									<label for="password">Mot de Passe :</label><input type="password" name="password" id="password" />
									</p>
									</fieldset>
									<p><input type="submit" value="Connexion" /></p>
								    </form> ';
								}
								else
								{
									echo "<br><br><br>Resultat de la comparaison des mots de passe: ";
									echo $isPasswordCorrect;
								    if ($isPasswordCorrect==0) {
								    	$req2 = $bdd->prepare('SELECT nom, prenom, rang FROM compte WHERE mail = :mail');
										$req2->execute(array(
										    'mail' => $mail));
										$resultat2 = $req2->fetch();
										$id= $resultat2['nom'] . " " . $resultat2['prenom'];
								        $_SESSION['id'] = $id;
								        $_SESSION['rang'] = $resultat2['rang'];
								        header('Location: acceuil.php');
								    }
								    else {
								        echo '<p>Mauvais identifiant ou mot de passe !</p>';
								        echo '<br><br><h1>Connectez vous</h1><ul><li><a href="inscription.php">Inscription</a></li></ul>
										<br><br><form method="post" action="index.php">
										<fieldset>
										<legend>Connexion</legend>
										<p>
										<label for="mail">Adresse mail :</label><input name="mail" type="text" id="mail" /><br /><br>
										<label for="password">Mot de Passe :</label><input type="password" name="password" id="password" />
										</p>
										</fieldset>
										<p><input type="submit" value="Connexion" /></p>
									    </form> ';
								    }
								}
							}
					}
		?>
	</body>
	<div id="copyright">
		<div class="conteneur">
		<p>Copyright @DUT R&T 2ème année Projet Data Scientist- <a href="">Mentions légales</a> - <a href="">Plan du site</a></p>
		</div>
	</div>
</html>
