<?php
// define("DB_HOST", 'localhost');
// define("DB_NAME", 'livreor');
// define('DB_CHARSET', 'utf8');
// define("DB_USER", 'root');
// define("DB_PASSWORD", '');

# Docker Config
define("DB_HOST", 'db');
define("DB_NAME", 'mydb');
define('DB_CHARSET', 'utf8');
define("DB_USER", 'user');
define("DB_PASSWORD", 'password');

//plesk
/*define("DB_HOST", 'localhost');
define("DB_NAME", 'jules-jean-louis_livreor');
define('DB_CHARSET', 'utf8');
define("DB_USER", 'jules');
define("DB_PASSWORD", '3T9w!ql77');*/
class Comment
{
    protected $db;

    public function __construct()
    {
        // Connexion à la base de données PostgreSQL
        try {
            $this->db = new PDO(
                "pgsql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";options='--client_encoding=" . DB_CHARSET . "'",
                DB_USER,
                DB_PASSWORD
            );
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
            exit;
        }
    }

    public function getComments()
    {
        $query = $this->db->prepare("SELECT date, login, commentaire FROM utilisateurs INNER JOIN commentaires ON utilisateurs.id = commentaires.id_utilisateur ORDER BY date DESC;");
        $query->execute();
        header("Content-Type: application/json");
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($result, JSON_PRETTY_PRINT);
    }

    public function insertComment($comment, $id)
    {
        $query = $this->db->prepare("INSERT INTO commentaires (commentaire, id_utilisateur, date) VALUES (:commentaire, :id_utilisateur, NOW())");
        $result = $query->execute([
            'commentaire' => $comment,
            'id_utilisateur' => $id,
        ]);
        return $result;
    }
}
