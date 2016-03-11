<?php

	function auth_control($control){
		if ($control){
			header('location: /control-'.$control);
		} else{
			header('location: /login');
		}
	}

?>