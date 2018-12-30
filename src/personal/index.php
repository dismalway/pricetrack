<?php 
  session_start();
  
  if (!isset($_SESSION['email'])) {
  	header('Location:' . '/');
    exit;
  }
  require_once("../functions.php");
?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title>PriceTrack - личный кабинет</title>

		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/style.min.css" rel="stylesheet">

		<link href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" rel="stylesheet">
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
			<div class="container">
				<a class="navbar-brand" href="/">PriceTrack</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
	        <span class="navbar-toggler-icon"></span>
	      </button>
	      <div class="collapse navbar-collapse" id="navbarResponsive">
	      	<ul class="navbar-nav ml-auto">
	      		<li class="nav-item">
							<a class="nav-link" href="#about">О нас</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#features">Преимущества</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#contact">Контакты</a>
						</li>
						<li class="nav-item nav-item-signin dropdown">
							<?php echo showLogin(); ?>
							<div class="dropdown-menu">
								<a class="dropdown-item nav-link-logout" href="#">Выход</a>
					    </div>
						</li>
					</ul>
	      </div>	
			</div>
		</nav>
		<footer class="footer">
	  	<div class="container">
	  		<div class="row text-center">
	  			<div class="col-12 col-md-4 text-md-left mb-3">
	  				<a class="footer__brand" href="#">PriceTrack</a>
	  			</div>
	  			<div class="col-12 col-md-4 mb-3">
	  				<div class="row text-center social mx-auto">
	  					<div class="col">
	  						<a href="https://www.vk.com" target="_blank" title="ВКонтакте">
	  							<i class="fab fa-2x fa-vk"></i>
	  						</a>
	  					</div>
	  					<div class="col">
	  						<a href="https://www.facebook.com" target="_blank" title="Facebook">
	  							<i class="fab fa-2x fa-facebook-f"></i>
	  						</a>
	  					</div>
	  					<div class="col">
	  						<a href="https://www.instagram.com" target="_blank" title="Instagram">
	  							<i class="fab fa-2x fa-instagram"></i>
	  						</a>
	  					</div>
	  				</div>
	  			</div>
	  			<div class="col-12 col-md-4 mb-3 text-md-right">
	  				<div>PriceTrack</div>
	  				<span>Copyright &copy 2018</span>
	  			</div>
	  		</div>
	  	</div>
	  </footer>
	 	<script src="../js/jquery.min.js"></script>
	  <script src="../js/bootstrap.bundle.min.js"></script>
		<script src="../js/common.min.js"></script>
		<script src="../js/menu.min.js"></script>
	</body>
</html>