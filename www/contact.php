<?php
 session_start (); // on démarre la session
 ?>
<!DOCTYPE html>
<html>
	<head>
 		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 		<meta http-equiv="Content-Language" content="fr" />
 		<link href="General.css" rel="stylesheet"/>
	 	<title>
  			DSP
		</title>
	</head>
	<body>
		<nav>
			<div class="conteneur">
				<img src="logo.png" width="100" height="100" alt="logo" id="logo">
				<ul id="navigation">
					<li>						
						<a href="acceuil.php">Acceuil</a>
					</li>
					<li>
						<a href="stat.php">Statistiques</a>
					</li>
					<li>						
						<a href="changer.php">Ajouter/Modifier promotion</a>
					</li>
					<li>
						<a href="contact.php">Contact</a>
					</li>
					<li>
						<a href="compte.php">Compte : <?php
						echo $_SESSION['id'];
						echo "</a>";
						?>
					</li>	
				</ul>
			</div>
		</nav>
		<h1>Contact</h1>
		<br><br>
		<p>Ce projet tuteuré est mené par trois élèves de deuxième année : <br><br>Termet Mathieu<br>Barreau Pierre<br>Ndao Mouhamed<br><br>Vous pouvez nous contacter individuellement pour des remarques ou pour des conseils d'amélioration du site. Nous sommes ouvert à tout conseil et serions très heureux de pouvoir répondre à vos attente. Nos adresses mails sont respectivement : <br><br>mathieu.termet@etudiant.univ-rennes1.fr<br>pierre.barreau@etudiant.univ-rennes1.fr<br>ametndao@gmail.com<br><br>Vous pouvez également vous adresser aux enseignants responsables du projet. Voici leurs noms et leurs adresses mail respectives:<br>Mme Prigent : anne-francoise.lefeuvre-prigent@univ-rennes1.fr <br><br>M Gatel : david.gatel@univ-rennes1.fr<br>Mme Brosset : elodie.brosset@univ-rennes1.fr<br>M Bara : yann.bara@univ-rennes1.fr<br></p>
	</body>
	<div id="copyright">
		<div class="conteneur">
		<p>Copyright @DUT R&T 2ème année Projet Data Scientist- <a href="">Mentions légales</a> - <a href="">Plan du site</a></p>
		</div>
	</div>
</html>
