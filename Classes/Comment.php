<?php
require_once 'AbstractClasses/AbstractBDD.php';
class Comment extends AbstractBDD
{

    protected PDO $db;
    public function __construct()
    {
        parent::__construct();
        $this->db = $this->getBdd();
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
