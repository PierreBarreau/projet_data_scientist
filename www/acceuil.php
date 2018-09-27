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
						<a href="compte.php">Compte : <?php echo $_SESSION['pseudo'];?></a>
					</li>	
				</ul>
			</div>
		</nav>
		<header>
		<div class="conteneur">
			<h1>Data Scientist Project</h1>
			<?php
				echo "Vous êtes connecté en tant que ";
				echo $_SESSION['pseudo'];
			?>
			<p>Projet tuteuré de Mathieu TERMET, Mouhamed NDAO et Pierre BARREAU</p>
			<a id="en_savoir_plus" href="contact.php">en savoir plus</a>
		</div>
	</header>
	</body>
	<div id="copyright">
		<div class="conteneur">
		<p>Copyright @DUT R&T 2ème année Projet Data Scientist- <a href="">Mentions légales</a> - <a href="">Plan du site</a></p>
		</div>
	</div>
</html>
