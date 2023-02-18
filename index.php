<?php
session_start();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/login.css">
    <script src="https://kit.fontawesome.com/8b26d30613.js" crossorigin="anonymous"></script>
    <script defer src="script/LoginRegister.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Livre d'or</title>
</head>
<body>
<!-- HEADER -->
<?php include 'import/header.php' ?>
<!-- MAIN -->
<main>
    <article>
        <section id="curveBgProfil" class="lg:h-[93vh] lg:mx-2">
            <div id="containerIndex" class="flex justify-around lg:pt-[15%]">
                <div id="titleIndex" class="text-white">
                    <h2 class="lg:text-[4em]">
                        <span>Livre d'or</span>
                    </h2>
                    <p>
                        <span>Livre d'or, connecter vous pour commenter</span>
                    </p>
                </div>
                <div id="containerLoginRegister">
                    <div id="containerbutton">
                        <button id="buttonLogin" class="text-lg text-white rounded-full bg-[#010314]  px-4 py-2">Connexion</button>
                        <button id="buttonRegister" class="text-lg text-[#010314] rounded-full bg-white px-4 py-2">Inscription</button>
                    </div>
                    <div id="displayForm" class="mt-4"></div>
                </div>
            </div>
        </section>
    </article>
</main>
</body>
</html>
