<?php
require_once '../models/Comment.php';
require_once '../config/db_connection.php';

class CommentController {
    private $conn;

    public function __construct() {
        global $pdo;
        $this->conn = $pdo;
    }

    public function create($content, $id_user, $id_product) {
        $comment = new Comment($this->conn);
        return $comment->create($content, $id_user, $id_product);
    }

    public function getAll() {
        $comment = new Comment($this->conn);
        return $comment->getAll();
    }

    public function getById($id_comment) {
        $comment = new Comment($this->conn);
        return $comment->getById($id_comment);
    }

    public function update($id_comment, $content) {
        $comment = new Comment($this->conn);
        return $comment->update($id_comment, $content);
    }

    public function delete($id_comment) {
        $comment = new Comment($this->conn);
        return $comment->delete($id_comment);
    }
}