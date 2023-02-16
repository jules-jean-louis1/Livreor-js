<?php
include 'Classes/Comment.php';
session_start();

$comment = new Comment();
$comments = $comment->getComments();

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
        <div class="flex justify-center w-[80%]">
            <?php if (isset($_SESSION['login'])) { ?>
                <div class="flex flex-col">
                    <form action="" method="post" id="commentForm">
                        <div class="flex flex-col">
                            <label for="commentaire">Commentaire :</label>
                            <textarea name="commentaire" id="commentaire" cols="30" rows="10"
                                      class="bg-slate-100"></textarea>
                        </div>
                        <button type="submit" id="submit" class="bg-blue-500 p-2 text-slate-100 hover:bg-blue-800">
                            Ajouter un commentaire
                        </button>
                    </form>
                </div>
                <div>
                    <p>
                        <span id="msgCom"></span>
                    </p>
                </div>
            <?php } else { ?>
                <button type="submit">Connectez-vous pour commenter</button>
            <?php } ?>
        </div>
        <div class="flex flex-col items-center">
            <?php foreach ($comments as $comment) { ?>
                <div class="flex flex-col items-center w-[80%] rounded bg-slate-200 py-2 my-2">
                    <div class="flex flex-col items-center">
                        <div class="flex items-center space-x-2">
                            <span class="text-xl"><?= $comment['login'] ?></span>
                            <span class="text-sm"><?= $comment['date'] ?></span>
                        </div>
                        <div class="flex flex-col">
                            <span><?= $comment['commentaire'] ?></span>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </main>
</body>
</html>
