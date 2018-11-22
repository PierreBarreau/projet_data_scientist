<?php
	function Connect($sess){
		if (isset($sess)){
			return true;
		}
		else {
			return false;
		}
	}
	function Envoi_mail($dest){
		//=====Déclaration des messages au format texte et au format HTML.
		$message_html = "<html><head></head><body><h1>Confirmez votre adresse</h1><br><br>Veuillez cliquer sur le lien suivant pour confirmer votre adresse mail<br>
		<br>Nous espérons que vous apprécierz le travail que nous avons fourni. Pour tout retour, bon ou mauvais, vous pouvez envoyer un message à cette adresse.<br><br>
		L'équipe de projet</p></body></html>";
		//==========

		//déclaration du boundary dont on a besoin
		$boundary = "-----=".md5(rand());

		//=====Définition du sujet.
		$sujet = "Confirmation mail DSP";
		//=========

		//=====Création du header de l'e-mail
		$header = "From: \"PDS\"<jpo2010.rt@mail.com> \n ";
		$header .= "Reply-to: \"PDS\"".$dest." \n ";
		$header .= "MIME-Version: 1.0 \n ";
		$header .= "Content-Type: multipart/alternative;"."\n". "boundary=\"".$boundary ."\" \n";
		//==========
		$passage_ligne = "\n";
		//=====Création du message.
		$message = $passage_ligne."--".$boundary.$passage_ligne;
		$message.= $passage_ligne."--".$boundary.$passage_ligne;
		//=====Ajout du message au format HTML
		$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
		$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
		$message.= $passage_ligne.$message_html.$passage_ligne;
		//==========
		$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
		$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
		//==========
		 
		//=====Envoi de l'e-mail.
		mail($mail,$sujet,$message,$header);
		//==========
	}
?>