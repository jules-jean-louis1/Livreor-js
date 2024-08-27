<?php
abstract class AbstractBDD
{
    private PDO $bdd;

    public function __construct()
    {
        $host = getenv('DB_HOST') ?: 'localhost';
        $dbname = getenv('DB_NAME') ?: 'mydb';
        $user = getenv('DB_USER') ?: 'user';
        $password = getenv('DB_PASSWORD') ?: 'password';

        try {
            $this->bdd = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
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
