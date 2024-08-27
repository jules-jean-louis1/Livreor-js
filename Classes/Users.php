<?php
require_once 'AbstractClasses/AbstractBDD.php';
class Users extends AbstractBDD
{
    protected PDO $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = $this->getBdd();
    }

    public function checkLogin(string $login)
    {
        $query = $this->db->prepare("SELECT COUNT(*) as total FROM utilisateurs WHERE login = :login");
        $query->execute(['login' => $login]);
        $result = $query->fetch();
        return $result['total'] > 0;
    }

    public function register(string $login, string $password): bool
    {
        $query = $this->db->prepare("INSERT INTO utilisateurs (login, password) VALUES (:login, :password)");
        return $query->execute([
            'login' => $login,
            'password' => password_hash($password, PASSWORD_BCRYPT),
        ]);
    }

    public function login(string $login, string $password)
    {
        $query = $this->db->prepare("SELECT * FROM utilisateurs WHERE login = :login");
        $query->execute(['login' => $login]);
        $result = $query->fetch();
        if ($result && password_verify($password, $result['password'])) {
            return $result;
        }
        return false;
    }

    public function updateLogin(string $login, $id): bool
    {
        $query = $this->db->prepare("UPDATE utilisateurs SET login = :login WHERE id = :id");
        return $query->execute(['login' => $login, 'id' => $id]);
    }

    public function updatePassword($password, $id): bool
    {
        $query = $this->db->prepare("UPDATE utilisateurs SET password = :password WHERE id = :id");
        return $query->execute(['password' => password_hash($password, PASSWORD_BCRYPT), 'id' => $id]);
    }

    public function updateLoginPassword($login, $password, $id): bool
    {
        $query = $this->db->prepare("UPDATE utilisateurs SET login = :login, password = :password WHERE id = :id");
        return $query->execute(['login' => $login, 'password' => password_hash($password, PASSWORD_BCRYPT), 'id' => $id]);
    }

    public function deleteUser($id): bool
    {
        $query = $this->db->prepare("DELETE FROM utilisateurs WHERE id = :id");
        return $query->execute(['id' => $id]);
    }
}
