<?php
class OrderController {

    public function createOrder($user_id, $address, $ship, $sum_price) {
        global $pdo;
        $order = new Order($pdo);
        return $order->createOrder($user_id, $address, $ship, $sum_price);
    }
}
?>