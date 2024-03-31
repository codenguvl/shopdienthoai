<?php
class Order {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function createOrder($user_id, $address, $ship, $sum_price) {
        $query = "INSERT INTO `order` (id_user, address, ship, sum_price) VALUES (:user_id, :address, :ship, :sum_price)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute(array(':user_id' => $user_id, ':address' => $address, ':ship' => $ship, ':sum_price' => $sum_price));
    }
}
?>