<?php
class User {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function isUsernameTaken($username) {
        $query = "SELECT COUNT(*) AS count FROM user WHERE username = :username";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(array(':username' => $username));
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'] > 0;
    }

    public function isEmailTaken($email) {
        $query = "SELECT COUNT(*) AS count FROM user WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(array(':email' => $email));
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'] > 0;
    }


    public function register($username, $pass, $email, $address) {
        if ($this->isUsernameTaken($username)) {
            return false;
        }
        if ($this->isEmailTaken($email)) {
            return false;
        }
        $query = "INSERT INTO user (username, pass, email, address, role) VALUES (:username, :pass, :email, :address, 'user')";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute(array(':username' => $username, ':pass' => $pass, ':email' => $email, ':address' => $address));
    }

    public function createAdmin($username, $pass, $email, $address, $role) {
        if ($this->isUsernameTaken($username)) {
            return false;
        }
        if ($this->isEmailTaken($email)) {
            return false;
        }
        $query = "INSERT INTO user (username, pass, email, address, role) VALUES (:username, :pass, :email, :address, :role)";
        $stmt = $this->conn->prepare($query);
        $result = $stmt->execute(array(':username' => $username, ':pass' => $pass, ':email' => $email, ':address' => $address, ':role' => $role));
        
        if ($result) {
            return $this->conn->lastInsertId();
        } else {
            return false;
        }
    }

    public function login($username, $pass) {
        $query = "SELECT * FROM user WHERE username = :username AND pass = :pass";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(array(':username' => $username, ':pass' => $pass));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAll() {
        $query = "SELECT * FROM user";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id_user) {
        $query = "SELECT * FROM user WHERE id_user = :id_user";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_user', $id_user);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id_user, $username, $pass, $email, $address, $role) {
        $query = "UPDATE user SET username = :username, pass = :pass, email = :email, address = :address, role = :role WHERE id_user = :id_user";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_user', $id_user);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':pass', $pass);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':role', $role);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function delete($id_user) {
        $query = "DELETE FROM user WHERE id_user = :id_user";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_user', $id_user);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function forgotPass($email) {
        $newPassword = "new_password_generated"; 
        $query = "UPDATE user SET pass = :pass WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':pass', $newPassword);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->rowCount(); 
    }
}
?>