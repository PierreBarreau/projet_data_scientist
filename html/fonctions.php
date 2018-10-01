<?php
	function Connect($sess){
		$nom = $_SESSION['nom'];
		if ($nom !== ''){
			return true;
		}
		else {
			return false;
		}
	}
?>