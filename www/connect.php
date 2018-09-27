<?php
session_start (); // on démarre la session
$login=$_POST['login'];
$mdp=$_POST['mdp'];

$monfichier = fopen('compte.txt','r');
#$nbr = count(file($monfichier));
for ($i = 1; $i <= 5; $i++) {
	$ligne=fgets($monfichier);
	list($log, $pass)=split(';',2);
	if ( $log == $login && $pass == $mdp ){
		header('Location: index.php');
	}
	else{
		echo "nop";
	}
	fclose($monfichier);
}
?>