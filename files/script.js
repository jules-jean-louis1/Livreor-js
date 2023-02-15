const form = document.querySelector('form');
form.addEventListener('submit', (event) => {
    event.preventDefault(); // Empêche le formulaire de se soumettre normalement

    const username = document.querySelector('#username').value;
    const password = document.querySelector('#password').value;

    const data = new FormData();
    data.append('username', username);
    data.append('password', password);

    fetch('script.php', {
        method: 'POST',
        body: data
    })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                // Redirige l'utilisateur vers une page de bienvenue
                alert("Vous êtes connecté");
                window.location.href = 'index.php';
            } else {
                alert(result.message);
            }
        })
        .catch(error => console.error(error));
});
