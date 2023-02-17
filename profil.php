<?php
include 'Classes/Users.php';
session_start();
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
    <link rel="stylesheet" href="style/login.css">
    <script defer src="script/update.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/8b26d30613.js" crossorigin="anonymous"></script>
    <title>Profil</title>
</head>
<body>
<?php include 'import/header.php' ?>
    <main>
        <article class="flex justify-center" id="ProfilFontPage">
            <section class="w-[90%] lg:w-[95%] lg:pt-[5%] lg:h-[90vh] flex justify-center" id="curveBgProfil">
                <div class="flex flex-col items-center justify-center">
                    <div class="bg-white px-5 py-6 flex flex-col items-center justify-center" id="containerFormProfil">
                        <div id="imgProfil" class="w-[30%] h-[20%] bg-[#fff] rounded-lg flex justify-center py-3 px-3 mb-4">
                            <i class="fa-solid fa-user fa-2x"></i>
                        </div>
                        <h1 class="text-2xl font-semibold">Profil</h1>
                        <p class="mb-5 font-light text-slate-400">
                            <span>Modifer votre profil</span>
                        </p>
                        <div id="msgCount"></div>
                        <form action="" id="updateForm" class="flex flex-col space-y-2">
                            <label for="login">Login :</label>
                            <input type="text" name="login" id="login" value="<?php echo $_SESSION['login'] ?>" class="border-2 border-slate-200 rounded p-2 mb-4">
                            <label for="password">Password :</label>
                            <input type="password" name="password" id="password"
                                   value="<?php echo $_SESSION['password'] ?>" class="border-2 border-slate-200 rounded p-2">
                            <button type="submit" id="updateBtn" class="rounded-full bg-black hover:bg-slate-800 text-white py-2 mx-4 font-semibold">Modifier</button>
                        </form>
                        <form action="" method="post" id="suppProfil" class="flex justify-center w-full">
                            <button type="submit" id="suppBtn" class="rounded-full bg-red-600 hover:bg-red-800 text-white py-2 px-6 my-2 font-semibold">Supprimer le profil</button>
                        </form>
                    </div>
                </div>
            </section>
        </article>
    </main>
</body>
</html>