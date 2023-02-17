<?php

?>

<header class=" bg-[#010314] ">
    <div id="containerHeader" class="flex justify-between items-center py-3 mx-5 text-xl border-b-2 border-[#6633EEFF]">
        <div id="logo">
            <ul class="flex lg:space-x-2">
                <li>
                    <a href="index.php" class="text-[#AF9FFF] hover:text-[#7d63ff]">
                        <i class="fa-solid fa-message"></i>
                    </a>
                </li>
                <li class="text-[#AF9FFF] hover:text-[#7d63ff]">
                    <a href="commentaire.php">Livre d'or</a>
                </li>
            </ul>
        </div>
        <div id="menu">
            <ul class="flex lg:space-x-2 text-white">
                <?php if (isset($_SESSION['login'])) { ?>
                    <li class="border-2 border-[#AF9FFF] hover:border-[#7d63ff] rounded lg:px-3 lg:py-[0.1em] text-semibold">
                        <a href="commentaire.php">Poster</a>
                    </li>
                    <li class="border-2 border-[#AF9FFF] hover:border-[#7d63ff] rounded lg:px-3 lg:py-[0.1em] text-semibold">
                        <i class="fa-solid fa-circle-user"></i>
                        <a href="profil.php"><?= $_SESSION['login']?></a>
                    </li>
                    <li class="border-2 border-[#AF9FFF] hover:border-[#7d63ff] rounded lg:px-3 lg:py-[0.1em] text-semibold">
                        <a href="disconnect.php">Deconnexion</a>
                    </li>
                <?php } else { ?>
                    <li class="border-2 border-[#AF9FFF] hover:border-[#7d63ff] rounded lg:px-3 lg:py-[0.1em] text-semibold">
                        <a href="commentaire.php">Livre d'or</a>
                    </li>
                    <li class="border-2 border-[#AF9FFF] hover:border-[#7d63ff] rounded lg:px-3 lg:py-[0.1em] text-semibold">
                        <a href="inscription.php">Inscription</a>
                    </li>
                    <li class="border-2 border-[#AF9FFF] hover:border-[#7d63ff] rounded lg:px-3 lg:py-[0.1em] text-semibold">
                        <a href="connexion.php">Connexion</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</header>
