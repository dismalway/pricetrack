<?php 
  session_start();
  require_once("functions.php");
?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title>PriceTrack - сервис для отслеживания цены на товар в онлайн-магазине</title>

		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.min.css" rel="stylesheet">

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
					      <a class="dropdown-item nav-link-personal" href="/personal/">Личный кабинет</a>
								<a class="dropdown-item nav-link-logout" href="#">Выход</a>
					    </div>
						</li>
					</ul>
	      </div>	
			</div>
		</nav>

		<header class="header">
			<div class="container text-center">
				<div class="row">
					<div class="col-lg-10 mx-auto">
						<h1 class="header__title">Отслеживай и экономь!</h1>
					</div>
					<div class="col-lg-8 mx-auto">
						<p class="header__text mb-5">Сервис PriceTrack позволяет следить за стоимостью нужного вам товара, отслеживать динамику изменения цены и отправлять уведомления.</p>
						<a class="btn btn-success" href="#">Отслеживать товар</a>
					</div>
				</div>
			</div>
		</header>

		<section class="about py-section" id="about">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 mx-auto">
						<div class="about__content text-center">
							<h2 class="about__title">У нас есть то, что вам нужно!</h2>
							<p class="about__text mb-4">
								Хотите купить товар по лучшей цене? Мы поможем вам в этом! Просто добавьте ссылку на понравившийся товар в наш сервис и мы сразу же начнем отслеживать его цену и проинформируем вас о каждом изменении стоимости по электронной почте.
							</p>
							<a class="btn btn-success" href="">Отслеживать товар</a>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="features py-section" id="features">
			<div class="container">
				<div class="row">
					<div class="col mx-auto text-center">
						<h2 class="features__title">Преимущества</h2>
					</div>
				</div>
				<div class="row text-center">
					<div class="col-lg-3 col-md-6">
						<div class="features__item mt-5">
							<i class="fas fa-4x fa-paper-plane mb-3 sr-icon-1"></i>
							<h3 class="features__heading mb-3">Быстрота</h3>
							<p class="features__description">Своевременное получение данных об изменении цены</p>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="features__item mt-5">
							<i class="fas fa-4x fa-envelope mb-3 sr-icon-2"></i>
							<h3 class="features__heading mb-3">Информирование</h3>
							<p class="features__description">Отправка уведомлений на электронную почту</p>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="features__item mt-5">
							<i class="fas fa-4x fa-chart-bar mb-3 sr-icon-3"></i>
							<h3 class="features__heading mb-3">Наглядность</h3>
							<p class="features__description">Построение графика изменения цены за указанный период</p>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="features__item mt-5">
							<i class="fas fa-4x fa-check mb-3 sr-icon-4"></i>
							<h3 class="features__heading mb-3">Простота</h3>
							<p class="features__description">Минимум действий для получения результата</p>
						</div>
					</div>
				</div>
		  </div>
		</section>

		<section class="contact py-section" id="contact">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 mx-auto">
						<div class="contact__content text-center">
							<h2 class="contact__title">Остались вопросы?</h2>
							<p class="contact__text mb-4">
								Отправьте нам письмо на адрес: <a class="contact__link" href="mailto:your-email@your-domain.com">pricetrack37@gmail.com</a> и мы свяжемся с вами как можно скорее!
							</p>
						</div>
					</div>
				</div>
			</div>
	  </section>

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
    
	  <section class="modal-block">
	  	<div class="modal-overlay">
	  		<div class="modal-signin">
	  			<div class="modal-signin__button-close">&times;</div>
		  		<div class="container-fluid pl-0 pr-0">
		  			<div class="row no-gutters">
		  				<div class="col">
		  					<div class="modal-switch">
					  			<a class="modal-switch__login" href="">Вход</a>
					  			<a class="modal-switch__signup" href="">Регистрация</a>
					  		</div>
		  				</div>
		  			</div>
		  			<div class="row">
		  				<div class="col col-login">
		  					<div class="modal-login">
					  			<form class="modal-login__form" method="POST">
					  				<div class="container">
					  					<div class="row">
					  						<div class="col">
					  							<div class="modal-group modal-login__group-email">
					  								<label class="modal-label">E-mail</label>
					  								<input class="modal-input" type="email" name="login-email" id="login-email">
					  							</div>
					  							<div class="modal-group modal-login__group-password">
					  								<label class="modal-label" for="login-password">Пароль</label>
					  								<input class="modal-input" type="password" name="login-password" id="login-password">
					  							</div>
					  							<div class="modal-group">
					  								<button class="btn btn-form modal-login__btn-submit" type="submit" name="submit">Войти</button>
					  							</div>
					  						</div>
					  					</div>
					  				</div>
					  			</form>
					  		</div>
		  				</div>
		  				<div class="col col-signup">
		  					<div class="modal-signup">
					  			<form class="modal-signup__form" method="POST">
					  				<div class="container">
					  					<div class="row">
					  						<div class="col">
					  							<div class="modal-group modal-signup__group-email">
					  								<label class="modal-label" for="signup-email">E-mail</label>
					  								<input class="modal-input" type="email" name="signup-email" id="signup-email">
					  							</div>
					  							<div class="modal-group modal-signup__group-password">
					  								<label class="modal-label" for="signup-password">Пароль</label>
					  								<input class="modal-input" type="password" name="signup-password" id="signup-password">
					  							</div>
					  							<div class="modal-group modal-signup__group-reppassword">
					  								<label class="modal-label" for="signup-reppassword">Повторите пароль</label>
					  								<input class="modal-input" type="password" name="signup-reppassword" id="signup-reppassword">
					  							</div>
					  							<div class="modal-group modal-signup__group-agreement">
					  								<input class="modal-signup__checkbox-agreement invisible" type="checkbox" name="signup-agreement" id="signup-agreement">
					  								<label class="modal-label modal-signup__label-agreement" for="signup-agreement">Я принимаю условия 
															<a class="modal-signup__link-agreement" href="#">соглашения</a>
					  								</label>
					  							</div>
					  							<div class="modal-group">
					  								<button class="btn btn-form modal-signup__btn-submit" type="submit" name="signup-submit">Зарегистрироваться</button>
					  							</div>
					  						</div>
					  					</div>
					  				</div>
					  			</form>
					  		</div>
		  				</div>
		  			</div>
		  		</div>
	  		</div>
	  	</div>
	  </section>	 
	 	<script src="js/jquery.min.js"></script>
	  <script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/common.min.js"></script>
		<script src="js/menu.min.js"></script>
		<script src="js/modal.min.js"></script>
	</body>
</html>