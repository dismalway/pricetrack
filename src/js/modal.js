var overlay = document.querySelector('.modal-overlay');

var modalSignin = document.querySelector(".modal-signin");
var closeSignin = document.querySelector('.modal-signin__button-close');

var linkLogout = document.querySelector('.nav-link-logout');

var modalLogin = document.querySelector(".modal-login");
var formLogin = document.querySelector(".modal-login__form");

var modalSignup = document.querySelector(".modal-signup");
var formSignup = document.querySelector(".modal-signup__form");

var switchSignup = document.querySelector(".modal-switch__signup");
var switchLogin = document.querySelector(".modal-switch__login");

var colLogin = document.querySelector(".modal-signin .col-login");
var colSignup = document.querySelector(".modal-signin .col-signup");

var btnSubmitLogin = document.querySelector(".modal-login__btn-submit");
var btnSubmitSignup = document.querySelector(".modal-signup__btn-submit");

showSigninForm();
closeSigninForm();
closeSigninFormKeyDown();
switchSigninForm();

function showSigninForm() {
	var linkSignin = document.querySelector('.nav-link-signin');
	linkSignin.addEventListener('click', function(event) {
		var isAuthorized = document.querySelector('.authorized');
		if (isAuthorized == null) {
			event.preventDefault();
			overlay.style.display = 'block';
			modalSignin.classList.add('modal-show');
	   
			showLoginForm();
			formSignup.reset();
			formLogin.reset();
			removeErrorElements();
	  }
	});
}

function closeSigninForm() {
	closeSignin.addEventListener('click', function(event) {
		event.preventDefault();
		if (modalSignin.classList.contains('modal-show')) {
			modalSignin.classList.remove('modal-show');
			overlay.style.display = 'none';
	  }
	});
}

function closeSigninFormKeyDown() {
	window.addEventListener('keydown', function(event) {
		if (event.keyCode === 27) {
		  if (modalSignin.classList.contains('modal-show')) {
				modalSignin.classList.remove('modal-show');
				overlay.style.display = 'none';
		  }
	  }
	});
}

function showLoginForm() {
	colLogin.style.display = 'block';
	colSignup.style.display = 'none';

	switchLogin.classList.add('active-tab');
	if (switchSignup.classList.contains('active-tab')) {
		switchSignup.classList.remove('active-tab');
  }
}

function showSignupForm() {
	colSignup.style.display = 'block';
	colLogin.style.display = 'none';

	switchSignup.classList.add('active-tab');
	if (switchLogin.classList.contains('active-tab')) {
		switchLogin.classList.remove('active-tab');
  }
}

function switchSigninForm() {
	switchLogin.addEventListener('click', function(event) {
		event.preventDefault();
		showLoginForm();
	});

	switchSignup.addEventListener('click', function(event) {
		event.preventDefault();
	  showSignupForm();
	});
}

function createErrorElement(text, parent) {
	var newElem = document.createElement('div');
  newElem.classList.add('error');
	newElem.innerHTML = text;
	parent.appendChild(newElem);
}

function removeErrorElements() {
	var elements = document.getElementsByClassName('error');
	for (var i = 0; i < elements.length; i++) {
		if (elements[i].parentNode) {
	    elements[i].parentNode.removeChild(elements[i]);
	    i--;
	  }
	}
}

function createLogin(email) {
  return email.substring(0, email.indexOf("@"));
}

window.onload = function() {
	btnSubmitSignup.addEventListener('click', function(event) {
		event.preventDefault();
		postSignupData();
	});

	btnSubmitLogin.addEventListener('click', function(event) {
		event.preventDefault();
		postLoginData();
	});
	
	if (linkLogout != null) {
		linkLogout.addEventListener('click', function(event) {
		  event.preventDefault();
		  logoutAccount();
		});
	}
}

function postSignupData() {
	var xhr = new XMLHttpRequest();
	var signupEmail = document.querySelector('#signup-email'),
			signupPassword = document.querySelector('#signup-password'),
			signupReppassword = document.querySelector('#signup-reppassword'),
			signupAgreement = document.querySelector('#signup-agreement');

	var params = 'signup-email=' + encodeURIComponent(signupEmail.value) + '&' + 
							 'signup-password=' + encodeURIComponent(signupPassword.value) + '&' + 
							 'signup-reppassword=' + encodeURIComponent(signupReppassword.value) + '&' + 
							 'signup-agreement=' + encodeURIComponent(signupAgreement.checked) + '&' +
							 'signup-submit=yes';

	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4) {
			var response = JSON.parse(xhr.responseText);
			if (response['result'] == 1) {
				modalSignin.classList.remove('modal-show');
				overlay.style.display = 'none';

				showSigninMenu(response['email']);
			} else {
				var arrError = JSON.parse(xhr.responseText);
				
				removeErrorElements();

				for (var key in arrError) {
					switch(key) {
						case 'err_email':
							var signupGroupEmail = document.querySelector('.modal-signup__group-email'); 
							createErrorElement(arrError[key], signupGroupEmail);
							break;
						case 'err_password':
							var signupGroupPassword = document.querySelector('.modal-signup__group-password'); 
							createErrorElement(arrError[key], signupGroupPassword);
							break;
						case 'err_reppassword':
							var signupGroupReppassword = document.querySelector('.modal-signup__group-reppassword'); 
							createErrorElement(arrError[key], signupGroupReppassword);
							break;
						case 'err_diff_password':
							var signupGroupReppassword = document.querySelector('.modal-signup__group-reppassword'); 
							createErrorElement(arrError[key], signupGroupReppassword);
							break;
						case 'err_exist_email':
							var signupGroupEmail = document.querySelector('.modal-signup__group-email');
							createErrorElement(arrError[key], signupGroupEmail);
							break;
						case 'err_accept_agreement':
							var signupGroupAgreement = document.querySelector('.modal-signup__group-agreement');
							createErrorElement(arrError[key], signupGroupAgreement);
							break;
					}
				}
			}
		}
	}

	xhr.open('POST', 'signup.php', true);
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xhr.send(params);
}

function postLoginData() {
	var xhr = new XMLHttpRequest();
	var loginEmail = document.querySelector('#login-email'),
			loginPassword = document.querySelector('#login-password');

	var params = 'login-email=' + encodeURIComponent(loginEmail.value) + '&' + 
							 'login-password=' + encodeURIComponent(loginPassword.value) + '&' + 
							 'login-submit=yes';

	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4) {
			var response = JSON.parse(xhr.responseText);
			if (response['result'] == 1) {
				modalSignin.classList.remove('modal-show');
				overlay.style.display = 'none';

				showSigninMenu(response['email']);
			} else {
				var arrError = JSON.parse(xhr.responseText);

				removeErrorElements();

				for (var key in arrError) {
					switch(key) {
						case 'err_email':
							var loginGroupEmail = document.querySelector('.modal-login__group-email'); 
							createErrorElement(arrError[key], loginGroupEmail);
							break;
						case 'err_password':
							var loginGroupPassword = document.querySelector('.modal-login__group-password'); 
							createErrorElement(arrError[key], loginGroupPassword);
							break;
						case 'err_wrong_email':
							var loginGroupEmail = document.querySelector('.modal-login__group-email'); 
							createErrorElement(arrError[key], loginGroupEmail);
							break;
						case 'err_wrong_password':
							var loginGroupPassword = document.querySelector('.modal-login__group-password'); 
							createErrorElement(arrError[key], loginGroupPassword);
							break;
					}
				}
			}
		}
	}

	xhr.open('POST', 'login.php', true);
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xhr.send(params);
}

function logoutAccount() {
	var xhr = new XMLHttpRequest();

	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4) {
			var response = JSON.parse(xhr.responseText);
			if (response['result'] == 1) {
				hideSigninMenu();
			}
	  }
  }
  xhr.open('POST', 'logout.php', true);
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xhr.send();
}

function showSigninMenu(email) {
	var itemSignin = document.querySelector('.nav-item-signin');

	itemSignin.innerHTML = 
	'<a class="nav-link nav-link-signin authorized dropdown-toggle" data-toggle="dropdown" href="#">' + 
	createLogin(email) + '</a>' +
  '<div class="dropdown-menu">' +
    '<a class="dropdown-item nav-link-personal" href="#">Личный кабинет</a>' +
		'<a class="dropdown-item nav-link-logout" href="#">Выход</a>' + 
  '</div>';
  
  var linkLogout = document.querySelector('.nav-link-logout');
  linkLogout.addEventListener('click', function(event) {
    event.preventDefault();
	  logoutAccount();
	});
}

function hideSigninMenu() {
	var itemSignin = document.querySelector('.nav-item-signin');
	itemSignin.innerHTML = '<a class="nav-link nav-link-signin" href="#">Войти</a>';
	showSigninForm();
}


