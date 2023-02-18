const displayForm = document.querySelector('#displayForm');
const btnRegisterForm = document.querySelector('#buttonRegister');
const error = document.querySelector('#error');
const registerForm = document.querySelector('#register-form');

btnRegisterForm.addEventListener('click', async (e) => {
    await fetch('register.php')
    .then((response) => {
        return response.text();
    })
    .then((data) => {
        displayForm.innerHTML = data;
    })
    const registerForm = document.querySelector('#register-form');
    registerForm.addEventListener("submit", (ev) =>{
        ev.preventDefault();
        fetch('fetch_register.php', {
            method: 'POST',
            body: new FormData(registerForm)
        })
        .then((response) => {
            return response.json();
        })
        .then((data) => {
            const errorMessages = document.querySelector('#errorMsg');
            let password = document.querySelector('#passwordR');
            if (data.success === 'empty') {
                console.log("Veuillez remplir les champs");
                errorMessages.innerHTML = "Veuillez remplir les champs";
                errorMessages.classList.add("alert-danger");
                errorMessages.classList.remove("alert-success");
            } else if (data.success === "loginUsed") {
                console.log("Login déjà utilisé");
                errorMessages.innerHTML = "Login déjà utilisé";
                errorMessages.classList.add("alert-danger");
                errorMessages.classList.remove("alert-success");
            } else if (validPassword(password) === false) {
                console.log("Le mot de passe doit contenir au moins 5 caractères, une majuscule, une minuscule et un chiffre.");
            } else if (data.success === "passwordMatch") {
                console.log("Les mots de passe ne correspondent pas");
                errorMessages.innerHTML = "Les mots de passe ne correspondent pas";
                errorMessages.classList.add("alert-danger");
                errorMessages.classList.remove("alert-success");
            }
            if (data.success === true) {
                console.log("Utilisateur créé");
                errorMessages.innerHTML = "Utilisateur créé";
                errorMessages.classList.add("alert-success");
                errorMessages.classList.remove("alert-danger");
            }
        })
    });
});
function emptyLogin() {
    let login = document.getElementById('loginR').value;
    if (login === "") {
        console.log('faux');
        return false;
    } else {
        console.log('vrai');
        return true;
    }
}

const validPassword = (passwordR) => {
    let small = document.querySelector('#passwordError');
    let reg = /^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z\d]{5,}$/;
    if (reg.test(passwordR.value) === false) {
        small.innerHTML = "Le mot de passe doit contenir au moins 5 caractères et un chiffre.";
        small.classList.add("is-invalid");
        small.classList.remove("is-valid");
        return false;
    } else {
        small.innerHTML = "";
        small.classList.remove("is-invalid");
        small.classList.add("is-valid");
        return true;
    }
}
