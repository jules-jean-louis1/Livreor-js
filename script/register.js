

const registerForm = document.querySelector('#register-form');
const error = document.querySelector('#error');


registerForm.addEventListener('submit', (e) => {
    e.preventDefault();
    let DataFormRegister = new FormData(registerForm);
    fetch('inscription.php', {
        method: 'POST',
        body: DataFormRegister
    })
    .then((response) => {
        if (response.status === 403) {
            // Le login est déjà utilisé
            error.innerHTML = "Le login est déjà utilisé";
            error.classList.add("alert-danger");
            error.classList.remove("alert-success");
        }
        if (response.status === 201) {
            // Le compte a bien été créé
            let msg = document.querySelector("#msgCount");
            msg.innerHTML = "Votre compte a bien été créé";
            msg.classList.add("alert-success");
            msg.classList.remove("alert-danger");
        } else {
            let msg = document.querySelector("#msgCount");
            msg.innerHTML = "Votre compte n'a pas été créé";
            msg.classList.add("alert-danger");
            msg.classList.remove("alert-success");
        }
    })
    .catch((error) => {
        console.error(error);
    });
});








