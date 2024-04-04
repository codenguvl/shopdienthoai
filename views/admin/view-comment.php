<?php
require_once '../config/db_connection.php';
require_once '../models/Comment.php';
require_once '../controllers/CommentController.php';

$commentController = new CommentController();

$productId = isset($_GET['id']) ? $_GET['id'] : null;

$comments = $commentController->getAll($productId);

?>

<div class="container mt-4">
    <h2>Comment</h2>
    <table id="datatablesSimple" class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Username</th>
                <th scope="col">Id user</th>
                <th scope="col">Nội dung</th>
            </tr>
        </thead>
        <tbody id="accTableBody">
            <?php foreach ($comments as $comment) : ?>
            <tr>
                <th scope="row"><?= $comment['id_comment'] ?></th>
                <td><?= $comment['username'] ?></td>
                <td><?= $comment['id_user'] ?></td>
                <td><?= $comment['content'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>