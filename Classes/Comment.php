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

    public function verfiyComment(string $comment): bool
    {
        if (strlen($comment) < 1) {
            return false;
        }
        if (!is_string($comment)) {
            return false;
        }
        return true;
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

    public function updateComment(string $comment, int $id): bool
    {
        $query = $this->db->prepare("UPDATE commentaires SET commentaire = :commentaire WHERE id = :id");
        $result = $query->execute([
            'commentaire' => $comment,
            'id' => $id,
        ]);
        return $result;
    }

    public function deleteComment(int $id): bool
    {
        $query = $this->db->prepare("DELETE FROM commentaires WHERE id = :id");
        $result = $query->execute([
            'id' => $id,
        ]);
        return $result;
    }
}
