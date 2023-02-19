<?php
include 'Classes/Users.php';
session_start();

if (isset($_POST['loginC'])) {
    $login = $_POST['loginC'];
    $password = $_POST['passwordC'];
    $users = new Users();
    $connexion = $users->login($login, $password);
    if (empty($login) || empty($password)) {
        header('content-type: application/json');
        echo json_encode(['success' => 'empty', 'message' => 'Veuillez remplir tous les champs']);
    } else if (!$connexion) {
        header('content-type: application/json');
        echo json_encode(['success' => 'NotMatch', 'message' => 'Login ou mot de passe incorrect']);
    } else if ($connexion) {
        $_SESSION['id'] = $connexion['id'];
        $_SESSION['login'] = $login;
        $_SESSION['password'] = $password;
        header('content-type: application/json');
        echo json_encode(['success' => true, 'message' => 'Connexion reussie']);
    }
}
?>