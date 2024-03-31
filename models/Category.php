<?php

class Category {
    private $conn;
    private $id_cate;
    private $name_cate;

    public function __construct($conn) {
        $this->conn = $conn;
    }


    public function create($name_cate) {
        $query = "INSERT INTO category (name_cate) VALUES (:name_cate)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name_cate', $name_cate);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function getAll() {
        $categories = array();
        $sql = "SELECT * FROM category";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id_cate) {
        $sql = "SELECT * FROM category WHERE id_cate = :id_cate";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_cate', $id_cate);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id_cate, $name_cate) {
        $query = "UPDATE category SET name_cate = :name_cate WHERE id_cate = :id_cate";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_cate', $id_cate);
        $stmt->bindParam(':name_cate', $name_cate);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function delete($id_cate) {
        $query = "DELETE FROM category WHERE id_cate = :id_cate";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_cate', $id_cate);
        $stmt->execute();
        return $stmt->rowCount();
    }
}