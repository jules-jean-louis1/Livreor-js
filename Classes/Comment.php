<?php
define("DB_HOST", 'localhost');
define("DB_NAME", 'livreor');
define('DB_CHARSET', 'utf8');
define("DB_USER", 'root');
define("DB_PASSWORD", '');

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
        // Connexion a la base de données
        try {
            $this->db = new PDO(
                "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET,
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
        $this->db->exec("set names utf8");

        $query = $this->db->prepare("SELECT `date`,`login`,`commentaire` FROM `utilisateurs` INNER JOIN `commentaires` WHERE utilisateurs.id = commentaires.id_utilisateur ORDER BY `date` DESC;");
        $query->execute();
        header("Content-Type: JSON");
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($result, JSON_PRETTY_PRINT);

    }
    public function insertComment($comment, $id)
    {
        $query = $this->db->prepare("INSERT INTO `commentaires` (`commentaire`, `id_utilisateur`, `date`) VALUES (:commentaire, :id_utilisateur, NOW())");
        $result = $query->execute
        ([
            'commentaire' => $comment,
            'id_utilisateur' => $id,
        ]);
        return $result;
    }
}
