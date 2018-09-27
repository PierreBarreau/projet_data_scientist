<?php
session_start (); // on démarre la session
$login=$_POST['login'];
$mdp=$_POST['mdp'];
$tentatives = $_POST['tentatives'];

$tentatives=1;
$tentatives = $_POST['tentatives'];
$bon=0;
while ($tentatives < 4) {
	$lines = file('compte.txt');
	foreach ($lines as $line_num => $line){
		list($log, $pass)=split(';',$line);
		if ( $log == $login && $pass == $mdp ){
			$bon = 1;
		}
		else {
			$tentatives++;
		}
		if ($bon == 1){
			header('Location: acceuil.php');
		}
	}
}

?>
<!DOCTYPE html>
<html>
	<head>
 		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 		<meta http-equiv="Content-Language" content="fr" />
	 	<title>
  			DSP
		</title>
	</head>
	<body>
		<h1>Connectez vous</h1>
		<?php
			if ($tentatives > 1) {
				echo "<p>Si vous n'avez pas de compte sur le site, nous vous demandons de vous addresser à Mme Prigent. 
				<br> Vous avez 3 tentatives avant que votre adresse IP ne soit bannie. Il vous reste " + $tentatives +" tentatives.
				<br><br><br>Si vous ne vous rappelez plus de votre mot de passe nous vous prions de nous envoyer un mail à cette adresse : xxxx@gmail.com";
			}
		?>
		<br><br><br>
		<!--formulaire qui envoie les information vers le script d'authentification : login et mdp-->
    <form method="post" action="connect.php">
        <fieldset>
        <input type="text" name="login" placeholder="Identifiant"/> <br/> 
        <input type="password" name="mdp" placeholder="Mot de passe" /> <br/>
        <br/>
        <input type="submit" value="Valider" class="btn btn-input" /> 
        <imput type="hidden" name="tentatives" value=<?php echo $tentatives; ?>>   
        </fieldset>   
    </form> 
	</body>
	<div id="copyright">
		<div class="conteneur">
		<p>Copyright @DUT R&T 2ème année Projet Data Scientist- <a href="">Mentions légales</a> - <a href="">Plan du site</a></p>
		</div>
	</div>
</html>
