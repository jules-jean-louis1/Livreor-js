<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Page de connexion</title>
</head>
<body>
<h1>Page de connexion</h1>
<form>
    <label for="username">Nom d'utilisateur :</label>
    <input type="text" id="username" name="username"><br>

    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password"><br>

    <button type="submit" id="submit">Se connecter</button>
</form>
<div>
    <button>
        <a href="<?php session_destroy()?>">Se déconnecter</a>
    </button>
</div>
<script src="script.js"></script>

</body>
</html>
