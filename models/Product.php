<?php
class Product {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create($name_product, $price, $image, $description, $id_cate) {
        $query = "INSERT INTO Product (name_product, price, image, description, id_cate) VALUES (:name_product, :price, :image, :description, :id_cate)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute(array(':name_product' => $name_product, ':price' => $price, ':image' => $image, ':description' => $description,':id_cate' => $id_cate));
    }

    public function getAll() {
        $query = "SELECT * FROM Product";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id_product) {
        $query = "SELECT * FROM Product WHERE id_product = :id_product";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_product', $id_product);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id_product, $name_product, $price, $image, $description, $id_cate) {
        $query = "UPDATE Product SET name_product = :name_product, price = :price, image = :image, description = :description, id_cate = :id_cate WHERE id_product = :id_product";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_product', $id_product);
        $stmt->bindParam(':name_product', $name_product);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':id_cate', $id_cate);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function delete($id_product) {
        $query = "DELETE FROM Product WHERE id_product = :id_product";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_product', $id_product);
        $stmt->execute();
        return $stmt->rowCount();
    }
}

?>