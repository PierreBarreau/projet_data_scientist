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
	$nom = $_SESSION['id'];
	if (Connect($nom)){
		if ($_SESSION['rang']==2||$_SESSION['rang']==1){
		echo"<body>";
		echo "<nav>
			<div class=\"conteneur\">
				<img src=\"logo.png\" width=\"100\" height=\"100\" alt=\"logo\" id=\"logo\">
				<ul id=\"navigation\">
					<li>						
						<a href=\"acceuil.php\">Acceuil</a>
					</li>
					<li>
						<a href=\"stat.php\">Statistiques</a>
					</li>
					<li>						
						<a href=\"changer.php\">Ajouter/Modifier promotion</a>
					</li>
					<li>
						<a href=\"contact.php\">Contact</a>
					</li>
					<li>
						<a href=\"compte.php\">Compte : ";
						echo $_SESSION['id'];
						echo "</a>
					</li>	
				</ul>
			</div>
		</nav>
		"?>
		<header>
		<div class=\"conteneur\">
			<h1>Gestion des comptes utilisateurs</h1>";
			<br><p>Sur cette page vous pouvez modifier les droits des comptes utilisateurs. Vous pouvez également supprimer des comptes utilisateurs si ceux-ci sont sujets à doutes quand à leur légitimité.</p>
			<br><br><p>Les droits utilisateurs sont les suivants : <br><br>1 -> root c'est-à-dire élèves en charge du projet<br>2 -> professeur
			chargé de l'administration du site Web<br>3 -> enseignant qui a les autorisations pour observer les statistiques mais qui n'a pas les autorisations pour
			modifier les promotions<br>4 - > aucun droit, incluant le droit de se connecter au site, il faut attendre que les droits du compte soient passés à 3 par exemple<br><br></p>
			<table width="60%" border="0" cellspacing="0">
			  <tr>
			    <th>Nom</th>
			    <th>Mail</th>
			    <th>Rang</th>
			    <th>Modifier</th>
			  </tr>
			<?php
			include('conection_bdd.php');
			$trait="";
			$nbre_comptes = $bdd -> query('SELECT COUNT(*) FROM compte');
			$requete = $bdd -> query('SELECT nom, mail, rang FROM compte');
			while($info = $requete->fetch())
			{?>
			   <tr>	
			    <td><?php echo $info['nom']?></td>
			    <td><?php echo $info['mail']?></td>
			    <td><?php if($info['rang']==1){
			    		echo "admin";
			    	}
			    	else{
			    		echo $info['rang'];
			    	}
			    	?></td>
			    <td><?php 
			    if($info['rang']==1){
			    	echo "Non modifiable";
			    }
			    else{
			    	echo '<a href="gestion_user2.php?mail='.$info['mail'].'">modifier</a>';
			    }
			    ?></td>
			   </tr>
			<?php
			}
			?>
			</table>
		</div>
	</header>
	</body>
	<?php
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
