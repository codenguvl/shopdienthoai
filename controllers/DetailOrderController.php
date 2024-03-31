<?php
class DetailOrderController {

    public function createDetailOrder($id_order, $id_product, $name_product, $price) {
        global $pdo;
        $detailOrder = new DetailOrder($pdo);
        return $detailOrder->createDetailOrder($id_order, $id_product, $name_product, $price);
    }
}
?>