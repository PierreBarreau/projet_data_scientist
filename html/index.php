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
			if (!isset($_POST['pseudo'])) //On est dans la page de formulaire
				{
					echo '<h1>Connectez vous</h1>
					<br><br><form method="post" action="index.php">
					<fieldset>
					<legend>Connexion</legend>
					<p>
					<label for="pseudo">Pseudo :</label><input name="pseudo" type="text" id="pseudo" /><br /><br>
					<label for="password">Mot de Passe :</label><input type="password" name="password" id="password" />
					</p>
					</fieldset>
					<p><input type="submit" value="Connexion" /></p></form>  
				    </form> ';
				} 
				    else{
						    $message='';
						    if (empty($_POST['pseudo']) || empty($_POST['password']) ) //Oublie d'un champ
						    {
						        $message = '<p>une erreur s\'est produite pendant votre identification.
							Vous devez remplir tous les champs</p>
							<p>Cliquez <a href="./connexion.php">ici</a> pour revenir</p>';
						}
						$lines = file('compte.txt');

						foreach ($lines as $line_num => $line){
							list($log, $pass, $nom , $prenom , $rang)=explode(';',$line);
							if ( $log == $_POST['pseudo'] && $pass == $_POST['password'] ){
								$_SESSION['pseudo']	= $_POST['pseudo'];
								$_SESSION['mdp'] = $_POST['password'];
								$_SESSION['level']	= $rang;
								$_SESSION['nom'] = $nom ;
								$_SESSION['prenom'] = $prenom;
								header('Location: acceuil.php');
							}
						}
				}
		?>
	<div id="copyright">
		<div class="conteneur">
		<p>Copyright @DUT R&T 2ème année Projet Data Scientist- <a href="">Mentions légales</a> - <a href="">Plan du site</a></p>
		</div>
	</div>
</html>
