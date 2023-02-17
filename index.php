<?php
session_start();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/login.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="script/LoginRegister.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Livre d'or</title>
</head>
<body>
<!-- HEADER -->
<?php include 'import/header.php' ?>
<!-- MAIN -->
<main>
    <article>
        <section id="curveBgProfil" class="lg:h-[95vh]">
            <div id="containerIndex">
                <div id="titleIndex">
                    <h2>
                        <span>Livre d'or</span>
                    </h2>
                    <p>
                        <span>Livre d'or, connecter vous pour commenter</span>
                    </p>
                </div>
            </div>
        </section>
    </article>
</main>
</body>
</html>
