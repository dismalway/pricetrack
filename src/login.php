<?php 
  session_start();

  require_once("functions.php");
	require_once("db.php");

  $err = [];
  $submit = clean($_POST['login-submit']); 
  if ($submit == 'yes') {
    
    $email = clean($_POST['login-email']);
    $password = clean($_POST['login-password']);

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    	$err['err_email'] = 'E-mail указан неверно';
    }

    if (empty($password) || checkLength($password, 6, 30)) {
    	$err['err_password'] = 'Пароль указан неверно';
    }

    if (count($err) > 0) {
			echo json_encode($err);
    } else {
    	$sql = "SELECT * FROM users WHERE email = :email";
	  	$stmt = $pdo->prepare($sql);
			$stmt->execute(['email' => $email]);
			$row = $stmt->fetchAll();

			if ($row[0] > 0) {

				if (md5(md5($password) . $row[0]['salt']) == $row[0]['password']) {
					$_SESSION['email'] = $email;
					$login = createLogin($email);

					echo json_encode(['result' => 1, 'email' => $email, 'login' => $login]); 
				} else {
					$err['err_wrong_password'] = 'Неверный пароль';
					echo json_encode($err);
				}      	
			} else {
				$err['err_wrong_email'] = 'E-mail не найден';
				echo json_encode($err);
			}
    }
	}
?>

