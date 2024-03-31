<?php
class DetailOrder {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function createDetailOrder($id_order, $id_product, $name_product, $price) {
        $query = "INSERT INTO order_detail (id_order, id_product, name_product, price) VALUES (:id_order, :id_product, :name_product, :price)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute(array(':id_order' => $id_order, ':id_product' => $id_product, ':name_product' => $name_product, ':price' => $price));
    }
}
?>