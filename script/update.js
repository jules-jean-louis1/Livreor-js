const updateForm = document.querySelector('#updateForm');

updateForm.addEventListener('submit', (e) => {
    e.preventDefault();
    let DataFormUpdate = new FormData(updateForm);
    fetch('profil.php', {
        method: 'POST',
        body: DataFormUpdate
    })
    .then((response) => {
        let msg = document.querySelector("#msgCount");
        if (response.status === 201) {
            msg.innerHTML = "Votre compte a bien été modifié";
        } else {
            msg.innerHTML = "Votre compte n'a pas été modifié";
        }
    })
});