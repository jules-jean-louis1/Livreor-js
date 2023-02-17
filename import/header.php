<?php

?>

<header class=" bg-[#000]">
    <div id="containerHeader" class="flex justify-between py-3 mx-5 text-xl">
        <div id="logo">
            <ul class="flex lg:space-x-2">
                <li><a href="index.php"><i class="fa-solid fa-message"></i></a></li>
                <li><a href="commentaire.php">Livre d'or</a></li>
            </ul>
        </div>
        <div id="menu">
            <ul class="flex lg:space-x-2 text-white">
                <?php if (isset($_SESSION['login'])) { ?>
                    <li class="bg-[#AF9FFF] rounded lg:px-3 lg:py-[0.2em] text-semibold">
                        <a href="profil.php">Profil</a>
                    </li>
                    <li>
                        <a href="disconnect.php">Deconnexion</a>
                    </li>
                <?php } else { ?>
                <li>
                    <a href="inscription.php">Inscription</a>
                </li>
                <li>
                    <a href="connexion.php">Connexion</a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</header>
