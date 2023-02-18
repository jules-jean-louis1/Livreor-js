<?php
include 'Classes/Users.php';

if (isset($_POST['loginR'])) {
    $login = $_POST['loginR'];
    $password = $_POST['passwordR'];
    $c_password = $_POST['c_passwordR'];

    $users = new Users();
    $checkifExist = $users->checkLogin($login);
    if (empty($login) || empty($password) || empty($c_password)) {
        header('content-type: application/json');
        echo json_encode(['success' => 'empty', 'message' => 'Veuillez remplir tous les champs']);
    } else if ($checkifExist) {
        header('content-type: application/json');
        echo json_encode(['success' => 'loginUsed', 'message' => 'Ce login existe déjà']);
        } else {
            if ($password != $c_password) {
                header('content-type: application/json');
                echo json_encode(['success' => 'passwordMatch', 'message' => 'Les mots de passe ne correspondent pas']);
            } else {
                $register = $users->register($login, $password);
                header('content-type: application/json');
                echo json_encode(['success' => true, 'message' => 'Inscription reussie']);
                }
        }
}
?>