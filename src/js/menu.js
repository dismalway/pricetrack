var linkSignin = document.querySelector('.nav-link-signin');
var menuSignin = document.querySelector('.nav-item-signin > .dropdown-menu');

window.addEventListener('load', function() {
	var linkLogout = document.querySelector('.nav-link-logout');	

	linkLogout.addEventListener('click', function(event) {
	  event.preventDefault();
	  logoutAccount();
	  redirectMainPage();
	});
});

function redirectMainPage() {
	if (document.location.pathname != '/') {
		document.location.href = '/';
	}
}

function showSigninMenu(login) {
	linkSignin.classList.add('authorized','dropdown-toggle');
	linkSignin.setAttribute('data-toggle', 'dropdown');
	linkSignin.innerHTML = login; 
	menuSignin.removeAttribute('style');
}

function hideSigninMenu() {
	linkSignin.classList.remove('authorized','dropdown-toggle');
	linkSignin.innerHTML = 'Войти'; 
	menuSignin.style.display = 'none';
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
  xhr.open('POST', '../logout.php', true);
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xhr.send();
}