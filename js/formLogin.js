// 1-SELECTEURS
let inputEmail = document.getElementById("inputEmail"),
  inputPassword = document.getElementById("inputPassword"),
  errorEmail = document.getElementById("errorEmail"),
  errorPassword = document.getElementById("errorPassword"),
  togglePassword = document.querySelector("#togglePassword");


// Event sur l'input EMAIL
inputEmail.addEventListener("change", function (e) {
  let email = e.target.value;

  if (email.includes("@")) {
    inputEmail.style.border = "2px solid #65da97";
    errorEmail.innerHTML = "";
    document.querySelector("#inputEmail + .fa-check-circle").style.visibility =
      "visible";
    document.querySelector(
      "#inputEmail + .fa-check-circle + .fa-exclamation-circle"
    ).style.visibility = "hidden";
  } else {
    inputEmail.style.border = "2px solid #e74c3c";
    errorEmail.innerHTML = "L'adresse email est incorrecte";
    errorEmail.style.color = "#e74c3c";
    document.querySelector("#inputEmail + .fa-check-circle").style.visibility =
      "hidden";
    document.querySelector(
      "#inputEmail + .fa-check-circle + .fa-exclamation-circle"
    ).style.visibility = "visible";
  }
});

// Event sur l'input PASSWORD
inputPassword.addEventListener("change", function (e) {
  let password = e.target.value;

  if (password.length >= 5) {
    inputPassword.style.border = "2px solid #65da97";
    errorPassword.innerHTML = "";
    document.querySelector("#inputPassword + .fa-check-circle").style.visibility =
      "visible";
    document.querySelector(
      "#inputPassword + .fa-check-circle + .fa-exclamation-circle"
    ).style.visibility = "hidden";
  } else {
    inputPassword.style.border = "2px solid #e74c3c";
    errorPassword.innerHTML =
      "Le mot de passe doit faire au moins 5 caractères";
    errorPassword.style.color = "#e74c3c";
    document.querySelector("#inputPassword + .fa-check-circle").style.visibility =
      "hidden";
    document.querySelector(
      "#inputPassword + .fa-check-circle + .fa-exclamation-circle"
    ).style.visibility = "visible";
  }
});


// Event sur l'input PASSWORD avec permutation de visibilité des caractères
togglePassword.addEventListener("click", function () {
  console.log("toto");
  // toggle the type attribute
  let type =
    inputPassword.getAttribute("type") === "password" ? "text" : "password";
  inputPassword.setAttribute("type", type);

  // toggle the icon
  this.classList.toggle("fa-eye-slash");
});
