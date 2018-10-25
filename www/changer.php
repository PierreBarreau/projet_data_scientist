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
  			Ajout modification promotion
		</title>
	</head>
	<body>
		<?php
		if ($_SESSION['rang']>2){
			?>
			<h1>Interdit</h1>
			<br><br><p>Nous n'avons pas pu vous connectez à cette page, le niveau d'accès de celle-ci est trop élevé. <br>
			Vous ne bénéfiniez pas de droit d'accès suffisant</p><br><br><br>
			<p>Il peut cependant s'agir d'une erreur. Si vous pensez que c'est le cas, vous pouvez vous adressez à Mme Prijent ou 
				envoyer un mail à l'adresse jpo2010.rt@gmail.com</p>
				<?php
		}
		else
		{
			?>
			<h1>Ajout et modification de promotion</h1>
			<br><br><br><p>Nous nous excusons mais cette partie du site n'est pas encore fonctionnelle. Pour plus d'informations vous pouvez vous adressez à Mme Prijent ou envoyer un mail à l'adresse jpo2010.rt@gmail.com</p>
			<?php
		}
		?>
		</body>
	<div id="copyright">
		<div class="conteneur">
		<p>Copyright @DUT R&T 2ème année Projet Data Scientist- <a href="">Mentions légales</a> - <a href="">Plan du site</a></p>
		</div>
	</div>
</html>
