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

class Users
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

    public function checkLogin($login)
    {
        $query = $this->db->prepare("SELECT COUNT(*) as total FROM utilisateurs WHERE login = :login");
        $query->execute(['login' => $login]);
        $result = $query->fetch();
        return $result['total'] > 0;
    }

    public function register($login, $password)
    {
        $query = $this->db->prepare("INSERT INTO utilisateurs (login, password) VALUES (:login, :password)");
        $result = $query->execute([
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
        if ($result && password_verify($password, $result['password'])) {
            return $result;
        }
        return false;
    }

    public function updateLogin($login, $id)
    {
        $query = $this->db->prepare("UPDATE utilisateurs SET login = :login WHERE id = :id");
        $result = $query->execute(['login' => $login, 'id' => $id]);
        return $result;
    }

    public function updatePassword($password, $id)
    {
        $query = $this->db->prepare("UPDATE utilisateurs SET password = :password WHERE id = :id");
        $result = $query->execute(['password' => password_hash($password, PASSWORD_BCRYPT), 'id' => $id]);
        return $result;
    }

    public function updateLoginPassword($login, $password, $id)
    {
        $query = $this->db->prepare("UPDATE utilisateurs SET login = :login, password = :password WHERE id = :id");
        $result = $query->execute(['login' => $login, 'password' => password_hash($password, PASSWORD_BCRYPT), 'id' => $id]);
        return $result;
    }

    public function deleteUser($id)
    {
        $query = $this->db->prepare("DELETE FROM utilisateurs WHERE id = :id");
        $result = $query->execute(['id' => $id]);
        return $result;
    }
}