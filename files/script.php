<?php
session_start();
// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=livreor', 'root', '');

// Récupération des données de formulaire
$username = $_POST['username'];
$password = $_POST['password'];


// Recherche de l'utilisateur correspondant dans la base de données
$query = $pdo->prepare('SELECT * FROM utilisateurs WHERE login = ?');
$query->execute([$username]);
$user = $query->fetch();

// Vérification du mot de passe
if ($user && password_verify($password, $user['password'])) {
  // La connexion réussit, on renvoie un message de succès
    $_SESSION['user'] = $user;
  header('Content-Type: application/json');
  echo json_encode(['success' => true]);
} else {
  // La connexion échoue, on renvoie un message d'erreur
  header('Content-Type: application/json');
  echo json_encode(['success' => false, 'message' => 'Nom d\'utilisateur ou mot de passe incorrect']);
}
?>
