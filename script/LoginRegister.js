const displayForm = document.querySelector("#displayForm");
const btnRegisterForm = document.querySelector("#buttonRegister");
const btnLoginForm = document.querySelector("#buttonLogin");
const error = document.querySelector("#error");
const registerForm = document.querySelector("#register-form");

const validPassword = (passwordR) => {
  let reg = /^.{4}$/;
  if (!reg.test(passwordR)) {
    return false;
  } else {
    return true;
  }
};

btnRegisterForm.addEventListener("click", async (e) => {
  await fetch("register.php")
    .then((response) => {
      return response.text();
    })
    .then((data) => {
      displayForm.innerHTML = data;
    });
  const registerForm = document.querySelector("#register-form");
  const errorMessages = document.querySelector("#errorMsg");
  registerForm.addEventListener("submit", (ev) => {
    ev.preventDefault();
    fetch("fetch_register.php", {
      method: "POST",
      body: new FormData(registerForm),
    })
      .then((response) => {
        return response.json();
      })
      .then((data) => {
        let password = document.querySelector("#passwordR");
        if (data.success === "empty") {
          errorMessages.innerHTML = "Veuillez remplir les champs";
        }
        if (data.success === "loginUsed") {
          console.log("Login déjà utilisé");
          errorMessages.innerHTML = "Login déjà utilisé";
        }
        if (!validPassword(password.value)) {
          errorMessages.innerHTML =
            "Le mot de passe doit contenir au moins 4 caractères.";
        }
        if (data.success === "passwordMatch") {
          errorMessages.innerHTML = "Les mots de passe ne correspondent pas";
        }
        if (data.success === true) {
          errorMessages.innerHTML = "Utilisateur créé";
        }
      });
  });
});

btnLoginForm.addEventListener("click", async (e) => {
  await fetch("login.php")
    .then((response) => {
      return response.text();
    })
    .then((data) => {
      displayForm.innerHTML = data;
    });
  const loginForm = document.querySelector("#LoginForm");
  const errorMessages = document.querySelector("#errorMsg");
  loginForm.addEventListener("submit", (ev) => {
    ev.preventDefault();
    fetch("fetch_login.php", {
      method: "POST",
      body: new FormData(loginForm),
    })
      .then((response) => {
        return response.json();
      })
      .then((data) => {
        if (data.success === "empty") {
          errorMessages.innerHTML = "Veuillez remplir les champs";
        }
        if (data.success === "NotMatch") {
          console.log("Login ou mot de passe incorrect");
          errorMessages.innerHTML = "Login ou mot de passe incorrect";
        }
        if (data.success === true) {
          console.log("Vous êtes connecté");
          errorMessages.innerHTML = "Vous êtes connecté";
          window.location.href = "commentaire.php";
        }
      });
  });
});
