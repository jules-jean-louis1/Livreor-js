<?php
include 'Classes/Users.php';

$login = 'admin';

$users = new Users();
$checkifExist = $users->checkLogin($login);
var_dump($checkifExist);
?>

 <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/login.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"> </script>
    <script src="script/register.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
    <main>
        <div class="flex flex-col items-center">
            <div class="logo">
                <i class="fas fa-user"></i>
            </div>
            <!--    FormInscription-->
            <div class="flex">
                <div class="tab-body" data-id="inscription">
                    <div class="registerMsg">
                        <span id="msgCount"></span>
                    </div>
                    <form action="connexion.php" method="post" id="register-form">
                        <div class="flex py-2">
                            <div class="flex flex-col">
                                <label for="loginR">Login :</label>
                                <input type="text" class="input rounded bg-slate-300 p-2 " placeholder="Login" id="loginR" name="loginR">
                                <small></small>
                            </div>
                        </div>
                        <div class="flex py-2">
                            <div class="flex flex-col">
                                <label for="passwordR">Mot de passe</label>
                                <input type="password" class="input rounded bg-slate-300 p-2" placeholder="Mot de Passe" id="passwordR" name="passwordR">
                                <small></small>
                            </div>
                        </div>
                        <div class="flex py-2">
                            <div class="flex flex-col">
                                <label for="c_passwordR">Confirmer Mot de passe</label>
                                <input type="password" name="c_passwordR" class="input rounded bg-slate-300 p-2" placeholder="Confirmer Mot de Passe" id="c_passwordR">
                                <small></small>
                            </div>
                        </div>
                        <button type="submit" class="rounded bg-purple-500 py-2 text-white hover:bg-purple-700 w-full">
                            Inscription
                        </button>
                    </form>
                </div>
            </div>
    </main>
</body>
</html>

