<?php
include 'Classes/Users.php';

if (isset($_POST['loginR'])) {
    $login = $_POST['loginR'];
    $password = $_POST['passwordR'];
    $c_password = $_POST['c_passwordR'];
    $users = new Users();
    $checkifExist = $users->checkLogin($login);
    if ($checkifExist) {
        header('content-type: application/json');
        echo json_encode(['success' => 'loginUsed', 'message' => 'Ce login existe déjà']);
    } else {
        if ($password == $c_password) {
            $register = $users->register($login, $password);
            if ($register) {
                header('content-type: application/json');
                echo json_encode(['success' => true, 'message' => 'Inscription reussie']);
            }
        }
    }
}
?>