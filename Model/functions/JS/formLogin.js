var email = document.getElementById("mail");
var pw = document.getElementById("pw");
var validation = document.getElementById("validation");

email.addEventListener("keyup", validateEmail);
validation.addEventListener("click", validatePw);
