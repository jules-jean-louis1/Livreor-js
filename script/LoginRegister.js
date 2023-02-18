const displayForm = document.querySelector('#displayForm');
const btnRegisterForm = document.querySelector('#buttonRegister');
const error = document.querySelector('#error');
const password = document.querySelector('#passwordR');
const c_password = document.querySelector('#c_passwordR');
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

            if (emptyLogin() && emptyPassword() === false) {
                console.log("Veuillez remplir les champs");
                errorMessages.innerHTML = "Veuillez remplir les champs";
                errorMessages.classList.add("alert-danger");
                errorMessages.classList.remove("alert-success");
            }
            if (data.success === "loginUsed") {
                console.log("Login déjà utilisé");
            } else {
                console.log("Login disponible");
            }
            if (data.success === true) {
                console.log("Utilisateur créé");
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
function emptyPassword() {
    let password = document.querySelector("#passwordR").value;
    let password2 = document.querySelector("#c_passwordR").value;
    if (password && password2 === "") {
        return false;
    } else {
        return true;
    }
}
