const loginForm = document.querySelector("#LoginForm");
const msg = document.querySelector("#msgCount");

loginForm.addEventListener("submit", (e) => {
  e.preventDefault();
  msg.innerHTML = "";
  let DataFormLogin = new FormData(loginForm);
  fetch("connexion.php", {
    method: "POST",
    body: DataFormLogin,
  })
    .then((response) => {
      if (response.status === 201) {
        // Le compte a bien été créé
        msg.innerHTML = "Vous êtes connecté";
        msg.classList.add("alert-success");
        msg.classList.remove("alert-danger");
      } else {
        msg.innerHTML = "Mauvais identifiants";
        msg.classList.add("alert-danger");
        msg.classList.remove("alert-success");
      }
    })
    .catch((error) => {
      console.error(error);
    });
});
