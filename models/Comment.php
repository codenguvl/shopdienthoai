<?php

class Comment {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create($content, $id_user, $id_product, $username) {
        $query = "INSERT INTO comment (content, id_user, id_product, username, time) VALUES (:content, :id_user, :id_product, :username,NOW())";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':id_user', $id_user);
        $stmt->bindParam(':id_product', $id_product);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function getAll($id_product) {
        $query = "SELECT * FROM comment WHERE id_product = :id_product";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_product', $id_product);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id_comment) {
        $query = "SELECT * FROM comment WHERE id_comment = :id_comment";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_comment', $id_comment);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id_comment, $content) {
        $query = "UPDATE comment SET content = :content WHERE id_comment = :id_comment";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_comment', $id_comment);
        $stmt->bindParam(':content', $content);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function delete($id_comment) {
        $query = "DELETE FROM comment WHERE id_comment = :id_comment";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_comment', $id_comment);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function deleteAllByProductId($id_product) {
        $query = "DELETE FROM comment WHERE id_product = :id_product";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_product', $id_product);
        $stmt->execute();
        return $stmt->rowCount();
    }
}