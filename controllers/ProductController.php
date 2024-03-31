<?php

class ProductController {

    public function create($name_product, $price, $image, $description, $id_cate) {
        global $pdo;
        $product = new Product($pdo);
        return $product->create($name_product, $price, $image, $description, $id_cate);
    }

    public function getAll() {
        global $pdo;
        $product = new Product($pdo);
        return $product->getAll();
    }

    public function getById($id_product) {
        global $pdo;
        $product = new Product($pdo);
        return $product->getById($id_product);
    }

    public function update($id_product, $name_product, $price, $image, $description, $id_cate) {
        global $pdo;
        $product = new Product($pdo);
        return $product->update($id_product, $name_product, $price, $image, $description, $id_cate);
    }

    public function delete($id_product) {
        global $pdo;
        $product = new Product($pdo);
        return $product->delete($id_product);
    }
}