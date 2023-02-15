const updateForm = document.querySelector('#updateForm');

updateForm.addEventListener('submit', (e) => {
    e.preventDefault();
    let DataFormUpdate = new FormData(updateForm);
    fetch('profil.php', {
        method: 'POST',
        body: DataFormUpdate
    })
    .then((response) => {
        if (response.status === 201) {
            // Le compte a bien été créé
            let msg = document.querySelector("#msgCount");
            msg.innerHTML = "Votre compte a bien été modifié";
            msg.classList.add("alert-success");
            msg.classList.remove("alert-danger");
        } else {
            let msg = document.querySelector("#msgCount");
            msg.innerHTML = "Votre compte n'a pas été modifié";
            msg.classList.add("alert-danger");
            msg.classList.remove("alert-success");
        }
    })
});