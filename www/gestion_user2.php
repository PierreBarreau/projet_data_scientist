<?php
 session_start (); // on démarre la session
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
	<?php
	include 'fonctions.php';
	include 'conection_bdd.php';
	$nom = $_SESSION['id'];
	if (Connect($nom)){
		if ($_SESSION['rang']==2||$_SESSION['rang']==1){
			$mail_recup=$_GET['mail'];
			$requete = 'SELECT nom, mail, rang FROM compte WHERE mail="'.$mail_recup.'"';
			$repp = $bdd->query($requete);
			$info = $repp ->fetch();
			if (!isset($_POST['supprimer'])) {
				?>
				<h1>Modifier compte <?php echo $info['nom']; ?></h1>
	            <form method="post" action="">
		            <fieldset>
			            <legend>Modifier rang :</legend>
			            <p>
		                
		                <?php
		                if ($info['rang']==2){
		                	echo '<div><input type="radio" name="rang" value="1" ><label for"1">1</label></div>
						<div><input type="radio" name="rang" value="2" checked><label for"2">2</label></div>
						<div><input type="radio" name="rang" value="3"><label for"3">3</label></div>
						<div><input type="radio" name="rang" value="4"><label for"4">4</label></div><br/><br>';
		                }
		                if ($info['rang']==3){
		                	echo '<div><input type="radio" name="rang" value="1" ><label for"1">1</label></div>
						<div><input type="radio" name="rang" value="2" ><label for"2">2</label></div>
						<div><input type="radio" name="rang" value="3" checked><label for"3">3</label></div>
						<div><input type="radio" name="rang" value="4"><label for"4">4</label></div><br/><br>';
		                }
		                if ($info['rang']==4){
		                	echo '<div><input type="radio" name="rang" value="1" ><label for"1">1</label></div>
						<div><input type="radio" name="rang" value="2" ><label for"2">2</label></div>
						<div><input type="radio" name="rang" value="3" ><label for"3">3</label></div>
						<div><input type="radio" name="rang" value="4" checked><label for"4">4</label></div><br/><br>';
		                }
						?>
					</fieldset>
					<fieldset>
		            	<legend>Supprimer le compte :</legend>
						<div><input type="radio" name="supprimer" value="non" checked><label for"non">Non</label></div>
						<div><input type="radio" name="supprimer" value="oui"><label for"oui">Oui</label></div>
		            	</p>
	            	</fieldset>
	            	<p><input type="submit" value="Valider" /></p></form>  
        		</form> 
            <?php
			}
			else{
				// on regarde si le but est la suppression du compte
				if(strcmp('oui',$_POST['supprimer'])==0){
					$query=$bdd->query('DELETE from compte WHERE mail='.$mail_recup);
					header('Location: gestion_user.php');
				}
				else{
					//on regarde si le but est la modification des droits
					if ($info['rang']!=$_POST['rang']){
						//ici on utilise un prepare car on n'a pas réussi à concatèner la chaîne. Le WHERE n'était plus pris en compte
						//on obtenait une syntaxe error de mariadB
						$req2 = $bdd->prepare('UPDATE compte SET rang = :rang WHERE mail = :mail');
						$req2->execute(array(
							'rang' => $_POST['rang'],
							'mail' => $mail_recup));
						echo $_POST['rang'];
						header('Location: gestion_user.php');
					}
				}
			}
	}
	else {
		echo "<h1>Vous n'avez pas des droits d'accès suffisant</h1>";
	}
}
	else {
		echo "<h1>Vous n'êtes pas connecté</h1><br><br><br>
			<p>Ce site n'est accessible qu'aux personnes ayant un identifiant.<br><br>
			Si vous estimez qu'il s'agit d'une erreur vous pouvez contacter Mme Prigent.</p>";
	}
	?>
	<div id="copyright">
		<div class="conteneur">
		<p>Copyright @DUT R&T 2ème année Projet Data Scientist- <a href="">Mentions légales</a> - <a href="">Plan du site</a></p>
		</div>
	</div>
</html>
