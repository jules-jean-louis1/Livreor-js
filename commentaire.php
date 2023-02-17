<?php
require_once 'Classes/Comment.php';
session_start();

if (isset($_POST['commentaire'])) {
    $commentaire = $_POST['commentaire'];
    $id = $_SESSION['id'];

    if (!empty($commentaire)) {
        $comment = new Comment();
        $insert = $comment->insertComment($commentaire, $id);
        if ($insert) {
            header('http/1.1 201 ok');
            echo json_encode(['status' => '201']);
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
    <script src="https://kit.fontawesome.com/8b26d30613.js" crossorigin="anonymous"></script>
    <script src="script/commentaire.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Commentaire</title>
</head>
<body>
<!-- H E A D E R -->
<?php require_once 'import/header.php'?>
<!-- H E A D E R -->
    <main class="lg:pt-[3%]">
        <article class="flex flex-col items-center">
            <div id="DisplayTitleComment" class="flex flex-col items-center pb-4">
                <?php if (isset($_SESSION['login']) != null) { ?>
                    <h1 class="text-white text-semibold text-lg">
                        <span class="text-2xl">Bonjour <?= $_SESSION['login'] ?></span>
                    </h1>
                    <p class="font-light text-slate-400">Ici vous pouvez laissez un commentaire ou lire celui des autres utilisateurs</p>
                    <?php } else { ?>
                    <h1 class="text-white text-semibold text-lg">
                        <span class="text-lg">Livre d'or</span>
                    </h1>
                    <p class="font-light text-slate-400">Connecter vous pouvez laissez un commentaire ou lire celui des autres utilisateurs</p>
                    <?php } ?>
            </div>
            <div id="containerBgComment" class="flex flex-col items-center pt-4 lg:w-[95%]">
                <div class="flex flex-col justify-center w-[80%] lg:pt-5">
                    <?php if (isset($_SESSION['login'])) { ?>
                        <div class="flex flex-col">
                            <form action="" method="post" id="commentForm">
                                <div class="flex flex-col">
                                    <label for="commentaire" class="text-white">Ecrivez votre commentaire :</label>
                                    <textarea name="commentaire" id="commentaire" cols="20" rows="10"
                                              class="rounded-[1rem] p-2 text-white" placeholder="Dites bonjour :)">
                                    </textarea>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <button type="submit" id="submit"
                                            class="py-2 px-5 rounded-full text-white bg-black hover:bg-slate-800 my-2 ease-out duration-100">
                                        Ajouter un commentaire
                                    </button>
                                    <div>
                                        <p class="py-2">
                                            <span id="msgCom"></span>
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <?php } else { ?>
                        <button type="submit">Connectez-vous pour commenter</button>
                    <?php } ?>
                </div>
                <div class="flex flex-col items-center" id="displayComment">
                </div>
            </div>
        </article>
    </main>
</body>
</html>
