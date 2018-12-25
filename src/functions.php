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

	function createSigninMenu() {
		if (isset($_SESSION['email'])) {
			$str = 
			'<a class="nav-link nav-link-signin authorized dropdown-toggle" data-toggle="dropdown" href="#">'.createLogin($_SESSION['email']).'</a>
		  <div class="dropdown-menu">
	      <a class="dropdown-item nav-link-personal" href="#">Личный кабинет</a>
				<a class="dropdown-item nav-link-logout" href="#">Выход</a>
	    </div>';
		} else {
    	$str = '<a class="nav-link nav-link-signin" href="#">Войти</a>';
		}
		return $str;
	}
?>



