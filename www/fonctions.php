<?php
	function Connect($sess){
		if (isset($sess)){
			return true;
		}
		else {
			return false;
		}
	}
?>