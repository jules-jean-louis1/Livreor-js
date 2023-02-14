<?php
define("DB_HOST", 'localhost');
define("DB_NAME", 'livreor');
define('DB_CHARSET', 'utf8');
define("DB_USER", 'root');
define("DB_PASSWORD", '');
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
    public function checkLogin($login)
    {
        $query = $this->db->prepare("SELECT COUNT(*) as total FROM utilisateurs WHERE login = :login");
        $query->execute(['login' => $login]);
        $result = $query->fetch();
        if ($result['total'] > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function register($login, $password)
        {
            $query = $this->db->prepare("INSERT INTO utilisateurs (login, password) VALUES (:login, :password)");
            $result = $query->execute
            ([
                'login' => $login,
                'password' => password_hash($password, PASSWORD_BCRYPT),
            ]);
            return $result;
        }

    public function login($login, $password)
    {
        $query = $this->db->prepare("SELECT * FROM utilisateurs WHERE login = :login");
        $query->execute(['login' => $login]);
        $result = $query->fetch();
        if ($result) {
            if (password_verify($password, $result['password'])) {
                return $result;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}