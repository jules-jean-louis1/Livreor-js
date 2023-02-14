const loginForm = document.querySelector('#LoginForm');

/*loginForm.addEventListener('submit', (e) => {
    e.preventDefault();
    let DataFormLogin = new FormData(loginForm);
    fetch('connexion.php', {
        method: 'POST',
        body: DataFormLogin
    })
    .then((response) => {
        if (response.status === 200) {
            // Le compte a bien été créé
            let msg = document.querySelector("#msgCount");
            msg.innerHTML = "Vous êtes connecté";
            msg.classList.add("alert-success");
            msg.classList.remove("alert-danger");
        } else {
            let msg = document.querySelector("#msgCount");
            msg.innerHTML = "Mauvais identifiants";
            msg.classList.add("alert-danger");
            msg.classList.remove("alert-success");
        }
    })
    .catch((error) => {
        console.error(error);
    });
});*/

loginForm.addEventListener('submit', (e) => {
    e.preventDefault();
    let DataFormLogin = new FormData(loginForm);
    fetch('connexion.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(DataFormLogin)
    })
        .then((response) => {
            return response.json();
        })
        .then((data) => {
            if (data.success === true) {
                // Le compte a bien été créé
                let msg = document.querySelector("#msgCount");
                msg.innerHTML = "Vous êtes connecté";
                msg.classList.add("alert-success");
                msg.classList.remove("alert-danger");
            } else {
                let msg = document.querySelector("#msgCount");
                msg.innerHTML = "Mauvais identifiants";
                msg.classList.add("alert-danger");
                msg.classList.remove("alert-success");
            }
        })
});

