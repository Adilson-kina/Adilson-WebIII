<?php

require_once 'DBConnection.php';

class User {
    // User properties
    private $name;
    private $login;
    private $password;
    private $email;
    private $recEmail;
    private $signDate = date('Y-m-d');
    private $active = true;
    private $level = 2;
    private $id_cliente_fk = null;
    private $id_vendedor_fk = null;

    private $conn;

    public function __construct() {
        $db = new DBConnection();
        $this->conn = $db->connect();
    }

    public function createUser(array $data){
        $this->name           = $data['name'];
        $this->email          = $data['email'];
        $this->recEmail       = $data['recEmail'];
        $this->password       = password_hash($data['password'], PASSWORD_DEFAULT);
        $this->level          = $data['level'];
        $this->login          = $data['login'];
        $this->id_cliente_fk  = $data['id_cliente_fk'] ?? null;
        $this->id_vendedor_fk = $data['id_vendedor_fk'] ?? null;

        $query = $this->conn->prepare("INSERT INTO usuarios (name, email, recEmail, password, signDate, active, level, login, id_cliente_fk, id_vendedor_fk) VALUES (:name, :email, :recEmail, :password, :signDate, :active, :level, :login, :id_cliente_fk, :id_vendedor_fk)");
        $query->bindParam(':name',           $this->name);
        $query->bindParam(':email',          $this->email);
        $query->bindParam(':recEmail',       $this->recEmail);
        $query->bindParam(':password',       $this->password);
        $query->bindParam(':signDate',       $this->signDate);
        $query->bindParam(':active',         $this->active);
        $query->bindParam(':level',          $this->level);
        $query->bindParam(':login',          $this->login);
        $query->bindParam(':id_cliente_fk',  $this->id_cliente_fk);
        $query->bindParam(':id_vendedor_fk', $this->id_vendedor_fk);

        $query->execute();
    }

    public function readUser(string $login) {
        $sql = "SELECT * FROM usuarios WHERE login = :login";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':login' => $login]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Update a user's data
     * @param string $name
     * @param array $data
     * @return bool
     */
    public function updateUser(string $login, array $data){
        $this->name           = $data['name'];
        $this->email          = $data['email'];
        $this->recEmail       = $data['recEmail'];
        $this->password       = password_hash($data['password'], PASSWORD_DEFAULT);
        $this->signDate       = $data['signDate'] ?? $this->signDate;
        $this->active         = $data['active'] ?? $this->active;
        $this->level          = $data['level'];
        $this->id_cliente_fk  = $data['id_cliente_fk'] ?? $this->id_cliente_fk;
        $this->id_vendedor_fk = $data['id_vendedor_fk'] ?? $this->id_vendedor_fk;
        
        $query = $this->conn->prepare("UPDATE usuarios SET name = :name, email = :email, recEmail = :recEmail, password = :password, signDate = :signDate, active = :active, level = :level, id_cliente_fk = :id_cliente_fk, id_vendedor_fk = :id_vendedor_fk WHERE login = :login");
        $query->bindParam(':name',           $this->name);
        $query->bindParam(':email',          $this->email);
        $query->bindParam(':recEmail',       $this->recEmail);
        $query->bindParam(':password',       $this->password);
        $query->bindParam(':signDate',       $this->signDate);
        $query->bindParam(':active',         $this->active);
        $query->bindParam(':level',          $this->level);
        $query->bindParam(':id_cliente_fk',  $this->id_cliente_fk);
        $query->bindParam(':id_vendedor_fk', $this->id_vendedor_fk);
        $query->bindParam(':login',          $login);
        $query->execute();
    }

    public function deleteUser(string $login){
        $query = $this->conn->prepare('DELETE FROM usuarios WHERE login = :login');
        $query->bindParam(':login', $login);
        $query->execute();
    }
}
