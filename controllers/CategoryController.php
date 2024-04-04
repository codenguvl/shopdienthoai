<?php

class CategoryController {
    private $conn;

    public function create($name_cate) {
        global $pdo;
        $category = new Category($pdo);
        return $category->create($name_cate);
    }

    public function getAll() {
        global $pdo;
        $category = new Category($pdo);
        return $category->getAll();
    }

    public function getById($id_cate) {
        global $pdo;
        $category = new Category($pdo);
        return $category->getById($id_cate);
    }

    public function update($id_cate, $name_cate) {
        global $pdo;
        $category = new Category($pdo);
        return $category->update($id_cate, $name_cate);
    }

    public function delete($id_cate) {
        global $pdo;
        $category = new Category($pdo);
        return $category->delete($id_cate);
    }
}