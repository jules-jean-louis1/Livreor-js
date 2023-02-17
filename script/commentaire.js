const commentForm = document.querySelector('#commentForm');
const commentMessage = document.querySelector('#commentaire');

/*Creation d'une fonction qui verifie si le champ commentaire est vide*/
function EmptyComment() {
    if (commentMessage.value === "") {
        let displaymsg = document.querySelector('#msgCom');
        displaymsg.innerHTML = "Votre message est vide.";
        displaymsg.classList.add("alert-danger");
        return false;
    }
}
/*Creation d'une fonction qui affiches les commentaires
depuis la base de données via la page fetch_comment.php*/
function displayComment() {
    fetch("fetch_comment.php")
        .then((response) => response.json())
        .then((data) => {
            const displayComment = document.querySelector('#displayComment');
            displayComment.innerHTML = "";
            data.forEach((comment) => {
                displayComment.innerHTML += `
                <div class="flex flex-col items-center w-[80%] rounded bg-slate-100 py-2 my-2">
                    <div class="flex flex-col items-center justify-start ">
                        <div class="flex items-center space-x-2">
                            <span class="text-lg">Par ${comment.login}</span>
                            <span class="text-sm">le ${comment.date}</span>
                        </div>
                        <div class="flex flex-col">
                            <span>${comment.commentaire}</span>
                        </div>
                    </div>
                </div>
                `;
            });
        });
}

/*Affiche les commentaires lorsque l'on arrive sur la page*/
displayComment();
/*Mettre a jour les commentaires lorsque l'on click sur le boutton
pour soummettre le formulaire*/
commentForm.addEventListener('submit', (e) => {
    e.preventDefault();
    displayComment();
});
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