<?php
ob_start();
date_default_timezone_set('America/Sao_Paulo');
error_reporting(0);
class session_control{

	function __construct(){
		session_start();
	}

	function setSession($vars,$val){
		$_SESSION[$vars] = $val;
	}
	
	function getSession($var){
		return $_SESSION[$var];
	}

}