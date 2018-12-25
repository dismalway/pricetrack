<?php 
  session_start();

  require_once("functions.php");
	require_once("db.php");

  $err = [];
  $submit = clean($_POST['signup-submit']); 
  if ($submit == 'yes') {
    
    $email = clean($_POST['signup-email']);
    $password = clean($_POST['signup-password']);
    $reppassword = clean($_POST['signup-reppassword']);
    $agreement = clean($_POST['signup-agreement']);

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    	$err['err_email'] = 'E-mail указан неверно';
    }

    if (empty($password) || checkLength($password, 6, 30)) {
    	$err['err_password'] = 'Пароль указан неверно';
    }

    if (empty($reppassword) || checkLength($reppassword, 6, 30)) {
    	$err['err_reppassword'] = 'Повторный пароль указан неверно'; 
    }

    if ($agreement != 'true') {
    	$err['err_accept_agreement'] = 'Не приняты условия соглашения'; 
    }

    if (count($err) > 0) {
			echo json_encode($err);
    } else {
    	if ($password != $reppassword) {
	    	$err['err_diff_password'] = 'Пароли не совпадают';
	    	echo json_encode($err);
	    } else {
	    	$sql = "SELECT COUNT(id) FROM users WHERE email = :email";
		  	$stmt = $pdo->prepare($sql);
				$stmt->execute(['email' => $email]);
				$row = $stmt->fetch(PDO::FETCH_NUM);

				if ($row[0] > 0) {
					$err['err_exist_email'] = 'E-mail уже существует';
					echo json_encode($err);
				} else {
					$salt = generateSalt();
        	$saltPassword = md5(md5($password) . $salt);

        	$sql_insert = "INSERT INTO users (email, password, salt) VALUES (:email, :password, :salt)";
        	$stmt = $pdo->prepare($sql_insert);
        	$stmt->execute(['email' => $email, 'password' => $saltPassword, 'salt' => $salt]);
					
					$_SESSION['email'] = $email;

					echo json_encode(['result' => 1, 'email' => $email]); 
				}
	    }
	  }
  } else {
  	echo json_encode(['result' => 0]); 
  }  
?>

