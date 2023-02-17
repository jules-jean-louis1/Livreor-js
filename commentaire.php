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
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="script/commentaire.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Commentaire</title>
</head>
<body>

    <main class="flex flex-col items-center pt-4">
        <div>
            <h1>
                <?php if(isset($_SESSION)) { ?>
                    <span class="text-2xl">Bonjour <?= $_SESSION['login']?></span>
                <?php } else { ?>
                    <span class="text-lg">Livre d'or</span>
                <?php } ?>
            </h1>
        </div>
        <div class="flex flex-col justify-center w-[80%]">
            <?php if (isset($_SESSION['login'])) { ?>
                <div class="flex flex-col">
                    <form action="" method="post" id="commentForm">
                        <div class="flex flex-col">
                            <label for="commentaire">Commentaire :</label>
                            <textarea name="commentaire" id="commentaire" cols="30" rows="10"
                                      class="bg-slate-100"></textarea>
                        </div>
                        <button type="submit" id="submit" class="bg-blue-500 py-2 px-5 rounded text-slate-100 hover:bg-blue-800 my-2 ease-out duration-100">
                            Ajouter un commentaire
                        </button>
                    </form>
                </div>
                <div>
                    <p class="py-2">
                        <span id="msgCom"></span>
                    </p>
                </div>
            <?php } else { ?>
                <button type="submit">Connectez-vous pour commenter</button>
            <?php } ?>
        </div>
        <div class="flex flex-col items-center" id="displayComment">
        </div>
    </main>
</body>
</html>
