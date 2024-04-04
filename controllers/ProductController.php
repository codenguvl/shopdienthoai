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

    public function getByCategoryId($id_cate) {
    global $pdo;
    $query = "SELECT * FROM Product WHERE id_cate = :id_cate";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id_cate', $id_cate);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
public function searchByName($search_term) {
    global $pdo;
    $query = "SELECT * FROM product WHERE name_product LIKE :search_term";
    $stmt = $pdo->prepare($query);
    $search_term = "%$search_term%";
    $stmt->bindParam(':search_term', $search_term);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getFourByCategory($id_cate) {
    global $pdo;
    $product = new Product($pdo);
    return $product->getFourByCategory($id_cate);
  }

}