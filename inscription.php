<?php
include 'Classes/Users.php';

if (isset($_POST['loginR'])) {
    $login = $_POST['loginR'];
    $password = $_POST['passwordR'];
    $c_password = $_POST['c_passwordR'];
    $users = new Users();
    $checkifExist = $users->checkLogin($login);
    if ($checkifExist) {
        header('http/1.1 403 Forbidden');
        echo json_encode(['status' => '403', 'message' => 'Ce login existe déjà']);
    } else {
        if ($password == $c_password) {
            $register = $users->register($login, $password);
            if ($register) {
                header('http/1.1 201 created');
                echo json_encode(['status' => '201', 'message' => 'Inscription reussie']);
            }
        }
    }
}




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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                    <form action="inscription.php" method="post" id="register-form">
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
                                <small id="passwordError" class="invalid-feedback"></small>
                            </div>
                        </div>
                        <div class="flex py-2">
                            <div class="flex flex-col">
                                <label for="c_passwordR">Confirmer Mot de passe</label>
                                <input type="password" name="c_passwordR" class="input rounded bg-slate-300 p-2" placeholder="Confirmer Mot de Passe" id="c_passwordR">
                                <small id="error"></small>
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

