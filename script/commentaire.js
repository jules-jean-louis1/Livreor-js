const commentForm = document.querySelector('#commentForm');
const commentMessage = document.querySelector('#commentaire');
function EmptyComment() {
    if (commentMessage.value === "") {
        let displaymsg = document.querySelector('#msgCom');
        displaymsg.innerHTML = "Votre message est vide.";
        displaymsg.classList.add("alert-danger");
        return false;
    }
}

commentForm.addEventListener('submit', (e) => {
    e.preventDefault();
    let DataFormComment = new FormData(commentForm);
    fetch('commentaire.php', {
        method: 'POST',
        body: DataFormComment
    })
    .then((response) => {
        if (EmptyComment() === false) {
            return;
        }
        if (response.status === 201) {
            let displaymsg = document.querySelector('#msgCom');
            displaymsg.innerHTML = "Votre message a été posté."
            displaymsg.classList.add("alert-success");
            displaymsg.classList.remove("alert-danger");
        } else {
            displaymsg.innerHTML = "Votre message n'a pas pu être poster.";
            displaymsg.classList.add("alert-danger");
            displaymsg.classList.remove("alert-success");
        }
    })
});