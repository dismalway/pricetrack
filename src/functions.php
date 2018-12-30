<?php 
	function clean($str = "") {
	  $str = trim($str);
	  $str = stripslashes($str);
	  $str = strip_tags($str);
	  $str = htmlspecialchars($str);
	  return $str;
	}

	function checkLength($str = "", $min, $max) {
	  $result = (mb_strlen($str) < $min || mb_strlen($str) > $max);
	  return $result;
	}

	function generateSalt() {
		$salt = '';
		$saltLength = 8;
		for ($i = 0; $i < $saltLength; $i++) {
			$salt .= chr(mt_rand(33, 126));
		}
		return $salt;
	}
  
	function createLogin($email) {
		return mb_substr($email, 0, strpos($email, '@'));
	}

	function checkSession() {
		return isset($_SESSION['email']);
	}

	function showLogin() {
		if (checkSession()) {
			$str = '<a class="nav-link nav-link-signin authorized dropdown-toggle" data-toggle="dropdown" href="#">'.createLogin($_SESSION['email']).'</a>';
		} else {
    	$str = '<a class="nav-link nav-link-signin" href="#">Войти</a>';
		}
		return $str;
	}
?>



