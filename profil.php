<?php
include 'Classes/Users.php';
session_start();
var_dump($_SESSION);
if (isset($_POST['login'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $id = $_SESSION['id'];

    if(!empty($login)) {
        $users = new Users();
        $update = $users->updateLogin($login, $id);
        if ($update) {
            $_SESSION['login'] = $login;
            header('http/1.1 201 ok');
            echo json_encode(['status' => '201']);
        }
    }
    if (!empty($password)) {
        $users = new Users();
        $update = $users->updatePassword($password, $id);
        if ($update) {
            $_SESSION['password'] = $password;
            header('http/1.1 201 ok');
            echo json_encode(['status' => '201']);
        }
    }
    if (!empty($login) && !empty($password)) {
        $users = new Users();
        $update = $users->updateLoginPassword($login, $password, $id);
        if ($update) {
            $_SESSION['login'] = $login;
            $_SESSION['password'] = $password;
            header('http/1.1 201 ok');
            echo json_encode(['status' => '201']);
        }
    }
}

if (isset($_POST['suppProfil'])) {
    $id = $_SESSION['id'];
    $users = new Users();
    $delete = $users->deleteUser($id);
    if ($delete) {
        session_destroy();
        header('http/1.1 201 ok');
        echo json_encode(['status' => '201']);
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="script/update.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
<?php include 'import/header.php' ?>
    <main>
        <div class="flex flex-col">
            <form action="" id="updateForm">
                <label for="login">Login</label>
                <input type="text" name="login" id="login" value="<?php echo $_SESSION['login'] ?>">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" value="<?php echo $_SESSION['password'] ?>">
                <button type="submit" id="updateBtn">Modifier</button>
            </form>
            <form action="" method="post" id="suppProfil">
                <button type="submit" id="suppBtn">Supprimer le profil</button>
            </form>
        </div>
    </main>
</body>
</html>