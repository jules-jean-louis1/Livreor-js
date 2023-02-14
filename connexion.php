<?php
include 'Classes/Users.php';
session_start();

if (isset($_POST['loginC'])) {
    $login = $_POST['loginC'];
    $password = $_POST['passwordC'];
    $users = new Users();
    $connexion = $users->login($login, $password);
    if ($connexion) {
        $_SESSION['login'] = $login;
        $_SESSION['password'] = $password;
        header('http/1.1 200 ok');
        echo json_encode(['status' => '200', 'message' => 'Connexion reussie']);
    } else {
        header('http/1.1 403 Forbidden');
        echo json_encode(['status' => '403', 'message' => 'Login ou mot de passe incorrect']);
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/login.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="script/login.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
<main>
    <div class="flex flex-col items-center">
        <div class="logo">
            <i class="fas fa-user"></i>
        </div>
        <!--    FormConnexion-->
        <div class="tab-body" data-id="connexion">
            <form action="connexion.php" method="post" id="LoginForm">
                <div class="flex">
                    <div class="flex flex-col">
                        <label for="loginC">Email :</label>
                        <input type="email" name="loginC" id="loginC" class="input rounded bg-slate-300 p-2"
                               placeholder="Nom d'utilisateur">
                    </div>
                </div>
                <div class="flex">
                    <div class="flex flex-col">
                        <label for="passwordC">Mot de passe</label>
                        <input name="passwordC" id="passwordC" placeholder="Mot de Passe" type="password"
                               class="input rounded bg-slate-300 p-2">
                    </div>
                </div>
                <div class="flex flex-col">
                    <small></small>
                    <button type="submit" class="rounded bg-purple-500 py-2 text-white hover:bg-purple-700"
                            id="loginbtn">
                        Connexion
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>
</body>
</html>


