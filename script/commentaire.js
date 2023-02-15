const commentForm = document.querySelector('#commentForm');

commentForm.addEventListener('submit', (e) => {
    e.preventDefault();
    let DataFormComment = new FormData(commentForm);
    fetch('commentaire.php', {
        method: 'POST',
        body: DataFormComment
    })
    .then((response) => {
        console.log(response);
    })
});