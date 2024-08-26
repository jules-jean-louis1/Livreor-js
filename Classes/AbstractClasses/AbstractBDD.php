<?php
abstract class AbstractBDD
{
    private PDO $bdd;

    public function __construct()
    {
        try {
            $this->bdd = new PDO('pgsql:host=db;dbname=mydb', 'user', 'password');
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
            exit;
        }
    }

    public function getBdd(): PDO
    {
        return $this->bdd;
    }
}
