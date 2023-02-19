const commentForm = document.querySelector('#commentForm');
const commentMessage = document.querySelector('#commentaire');
const displaymsg = document.querySelector('#msgCom');


function displayComment() {
    fetch("fetch_comment.php")
        .then((response) => response.json())
        .then((data) => {
            const displayComment = document.querySelector('#displayComment');
            displayComment.innerHTML = "";
            data.forEach((comment) => {
                displayComment.innerHTML += `
                <div class="flex flex-col items-start w-[100%] rounded-[1.2em] py-2 px-3 my-2 text-white" id="displayCommentList">
                    <div class="flex flex-col items-start justify-start ">
                        <div class="flex items-center space-x-2">
                            <h6 class="py-2">
                                <span>Par</span>
                                <i class="fa-solid fa-circle-user"></i>
                                <span class="text-lg">${comment.login}</span>
                                <span class="text-sm">le ${comment.date}</span>
                            </h6>
                        </div>
                        <div class="flex flex-col rounded p-2 bg-[#FFFFFF26]">
                            <p>
                                <span>${comment.commentaire}</span>
                            </p>
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
/*Creation d'une fonction qui verifie si le champ commentaire est vide*/
function EmptyComment() {
    if (commentMessage.value.length === 0) {
        let displaymsg = document.querySelector('#msgCom');
        displaymsg.innerHTML = "Votre message est vide.";
        displaymsg.classList.add("alert-danger");
        console.log("Votre message est vide.");
        return false;
    } else {
        return true
    }
}
EmptyComment();
/*Creation d'une fonction qui affiches les commentaires
depuis la base de données via la page fetch_comment.php*/
commentForm.addEventListener('submit', (e) => {
    e.preventDefault();
    setTimeout(displayComment, 50);
});
/*Function display success and failure*/
function displaySuccess() {
    displaymsg.innerHTML = "Votre message a été posté."
    displaymsg.classList.add("alert-success");
    displaymsg.classList.remove("alert-danger");
    // Ajoute une classe "fade-out" au message après 5 secondes
    setTimeout(() => {
        displaymsg.classList.remove("alert-success");
        displaymsg.classList.add("fade-out");
    }, 5000);
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
            displaySuccess();
            commentMessage.value = "";
        } else {
            displaymsg.innerHTML = "Votre message n'a pas pu être poster.";
            displaymsg.classList.add("alert-danger");
            displaymsg.classList.remove("alert-success");
        }
    })
});