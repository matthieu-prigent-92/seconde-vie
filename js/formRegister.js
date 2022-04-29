// 1-SELECTEURS
let texteH2 = document.querySelector("h2"),
  inputNom = document.getElementById("nickname"),
  inputTel = document.getElementById("telephone"),
  inputEmailRegister = document.getElementById("inputEmailRegister"),
  inputPasswordRegister = document.getElementById("inputPasswordRegister"),
  inputPasswordVerif = document.getElementById("inputConfirmPasswordRegister"),
  errorNom = document.getElementById("errorNom"),
  errorTel = document.getElementById("errorTel"),
  errorEmailRegister = document.getElementById("errorEmailRegister"),
  errorPasswordRegister = document.getElementById("errorPasswordRegister"),
  errorPasswordVerif = document.getElementById("errorPassword-verifRegister"),
  togglePasswordRegister = document.getElementById("togglePasswordRegister"),
  togglePasswordVerif = document.querySelector("#togglePassword-verifRegister");

// Event sur l'input NOM
inputNom.addEventListener("change", function (e) {
  let nom = e.target.value;

  if (nom != "") {
    inputNom.style.border = "2px solid #65da97";
    errorNom.innerHTML = "";
    texteH2.innerHTML = `Bienvenue ${nom} !`;
    document.querySelector("#nickname + .fa-check-circle").style.visibility =
      "visible";
    document.querySelector(
      "#nickname + .fa-check-circle + .fa-exclamation-circle"
    ).style.visibility = "hidden";
  } else {
    inputNom.style.border = "2px solid #e74c3c";
    errorNom.innerHTML = "Veuillez renseigner votre nom";
    errorNom.style.color = "#e74c3c";
    document.querySelector(
      "#nickname + .fa-check-circle + .fa-exclamation-circle"
    ).style.visibility = "visible";
  }
});
// Event sur l'input TEL
inputTel.addEventListener("change", function (e) {
  let tel = e.target.value;

  if (tel != "") {
    inputTel.style.border = "2px solid #65da97";
    errorTel.innerHTML = "";
    document.querySelector("#telephone + .fa-check-circle").style.visibility =
      "visible";
    document.querySelector(
      "#telephone + .fa-check-circle + .fa-exclamation-circle"
    ).style.visibility = "hidden";
  } else {
    inputTel.style.border = "2px solid #e74c3c";
    errorTel.innerHTML = "Veuillez renseigner votre numéro de téléphone";
    errorTel.style.color = "#e74c3c";
    document.querySelector(
      "#telephone + .fa-check-circle + .fa-exclamation-circle"
    ).style.visibility = "visible";
  }
});

// Event sur l'input EMAIL
inputEmailRegister.addEventListener("change", function (e) {
  let email = e.target.value;

  if (email.includes("@")) {
    inputEmailRegister.style.border = "2px solid #65da97";
    errorEmailRegister.innerHTML = "";
    document.querySelector("#inputEmailRegister + .fa-check-circle").style.visibility =
      "visible";
    document.querySelector(
      "#inputEmailRegister + .fa-check-circle + .fa-exclamation-circle"
    ).style.visibility = "hidden";
  } else {
    inputEmailRegister.style.border = "2px solid #e74c3c";
    errorEmailRegister.innerHTML = "L'adresse email est incorrecte";
    errorEmailRegister.style.color = "#e74c3c";
    document.querySelector("#inputEmailRegister + .fa-check-circle").style.visibility =
      "hidden";
    document.querySelector(
      "#inputEmailRegister + .fa-check-circle + .fa-exclamation-circle"
    ).style.visibility = "visible";
  }
});

// Event sur l'input PASSWORD
inputPasswordRegister.addEventListener("change", function (e) {
  let password = e.target.value;

  if (password.length >= 5) {
    inputPasswordRegister.style.border = "2px solid #65da97";
    errorPasswordRegister.innerHTML = "";
    document.querySelector("#inputPasswordRegister + .fa-check-circle").style.visibility =
      "visible";
    document.querySelector(
      "#inputPasswordRegister + .fa-check-circle + .fa-exclamation-circle"
    ).style.visibility = "hidden";
  } else {
    inputPasswordRegister.style.border = "2px solid #e74c3c";
    errorPasswordRegister.innerHTML =
      "Le mot de passe doit faire au moins 5 caractères";
    errorPasswordRegister.style.color = "#e74c3c";
    document.querySelector("#inputPasswordRegister + .fa-check-circle").style.visibility =
      "hidden";
    document.querySelector(
      "#inputPasswordRegister + .fa-check-circle + .fa-exclamation-circle"
    ).style.visibility = "visible";
  }
});

// Event sur l'input PASSWORD VERIF
inputPasswordVerif.addEventListener("change", function (e) {
  let passwordVerif = e.target.value;

  if (passwordVerif == inputPassword.value) {
    inputPasswordVerif.style.border = "2px solid #65da97";
    errorPasswordVerif.innerHTML = "";
    document.querySelector(
      "#inputConfirmPasswordRegister + .fa-check-circle"
    ).style.visibility = "visible";
    document.querySelector(
      "#inputConfirmPasswordRegister + .fa-check-circle + .fa-exclamation-circle"
    ).style.visibility = "hidden";
  } else {
    inputPasswordVerif.style.border = "2px solid #e74c3c";
    errorPasswordVerif.innerHTML =
      "Veuillez indiquer à nouveau le mot de passe";
    errorPasswordVerif.style.color = "#e74c3c";
    document.querySelector(
      "#inputConfirmPasswordRegister + .fa-check-circle"
    ).style.visibility = "hidden";
    document.querySelector(
      "#inputConfirmPasswordRegister + .fa-check-circle + .fa-exclamation-circle"
    ).style.visibility = "visible";
  }
});

// Event sur l'input PASSWORD avec permutation de visibilité des caractères
togglePasswordRegister.addEventListener("click", function () {
  console.log("Click to togglePasswordRegister");
  // toggle the type attribute
  let type =
    inputPasswordRegister.getAttribute("type") === "password" ? "text" : "password";
  inputPasswordRegister.setAttribute("type", type);

  // toggle the icon
  this.classList.toggle("fa-eye-slash");
});

// Event sur l'input PASSWORDVERIF avec permutation de visibilité des caractères
togglePasswordVerif.addEventListener("click", function () {
  console.log("Click to togglePasswordVerif");
  // toggle the type attribute
  let type =
    inputPasswordVerif.getAttribute("type") === "password"
      ? "text"
      : "password";
  inputPasswordVerif.setAttribute("type", type);

  // toggle the icon
  this.classList.toggle("fa-eye-slash");
});

// prevent form submit
let form = document.querySelector("form");
form.addEventListener("submit", function (e) {
  e.preventDefault();
});

// upload la photo
let imageInput = document.querySelector("#image-input");

imageInput.addEventListener("change", function () {
  let reader = new FileReader();
  reader.addEventListener("load", () => {
    let uploadedImage = reader.result;
    document.querySelector(
      "#display-image"
    ).style.backgroundImage = `url(${uploadedImage})`;
    document.querySelector("#display-image").style.backgroundColor = "white";
    document.querySelector(".photo").style.alignItems = "flex-end";
    // imageInput.style.visibility = "hidden";
  });
  reader.readAsDataURL(this.files[0]);
});
