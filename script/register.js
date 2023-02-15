

const registerForm = document.querySelector('#register-form');
const error = document.querySelector('#error');

const password = document.querySelector('#passwordR');
const c_password = document.querySelector('#c_passwordR');
function errorBorder(input) {
    input.className = "bg-slate-200 border-2 border-red-500 px-2 py-2 mx-2 rounded";
}
function successBorder(input) {
    input.className = "bg-slate-200 border-2 border-green-500 px-2 py-2 mx-2 rounded";
}
function matchPassword() {
    let password = document.querySelector("#passwordR").value;
    let c_password = document.querySelector("#c_passwordR").value;
    if (password !== c_password) {
        errorBorder(document.querySelector("#passwordR"));
        errorBorder(document.querySelector("#c_passwordR"));
        error.innerHTML = "Les mots de passe ne correspondent pas";
        error.classList.add("alert-danger");
        error.classList.remove("alert-success");
    } else {
        successBorder(document.querySelector("#passwordR"));
        successBorder(document.querySelector("#c_passwordR"));
        error.innerHTML = "";
        error.classList.remove("alert-danger");
    }
}
registerForm.addEventListener("keyup", function () {
    matchPassword();
});

registerForm.addEventListener('submit', (e) => {
    e.preventDefault();
    let DataFormRegister = new FormData(registerForm);
    let password = DataFormRegister.get("password");
    let c_password = DataFormRegister.get("c_password");
    console.log(password, c_password);
    if (password !== c_password) {
       errorBorder(document.querySelector("#password"));
       errorBorder(document.querySelector("#c_password"));
        error.innerHTML = "Les mots de passe ne correspondent pas";
        error.classList.add("alert-danger");
        error.classList.remove("alert-success");

    } else {
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
    }
});








