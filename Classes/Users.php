<?php
include '../PHP/config.php';
class Users
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
    public function register($login, $password,)
        {
            $query = $this->db->prepare("INSERT INTO utilisateurs (login, password) VALUES (:login, :password)");
            $result = $query->execute
            ([
                'login' => $login,
                'password' => password_hash($password, PASSWORD_BCRYPT),
            ]);
            return $result;
        }
}