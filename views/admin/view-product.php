<?php
require_once '../config/db_connection.php';
require_once '../models/Product.php';
require_once '../models/Comment.php';
require_once '../controllers/ProductController.php';
require_once '../controllers/CommentController.php';

$productController = new ProductController();
$products = $productController->getAll();

if (isset($_GET['delete_id'])) {
  $commentController = new CommentController();
  $deleteId = $_GET['delete_id'];
  $commentController->deleteAllByProductId($deleteId);
  $result = $productController->delete($deleteId);

  if ($result) {
    echo "<script>window.location.reload();</script>";
    exit();
  }
}

?>


<div class="container mt-4">
    <h2>Sản phẩm</h2>
    <table id="datatablesSimple" class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
                <!-- <th scope="col">Description</th> -->
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody id="productTableBody">
            <?php foreach ($products as $product) : ?>
            <tr>
                <td><?= $product['id_product'] ?></td>
                <td><?= $product['name_product'] ?></td>
                <td><?= number_format($product['price'], 3, ',', '.')  ?> đ</td>
                <td><img src="../uploads/<?= $product['image'] ?>" alt="<?= $product['name_product'] ?>"
                        style="max-width: 100px;"></td>
                <!-- <td> -->
                <!-- < -->
                <!-- ?= $product['description'] ?> -->
                <!-- </td> -->
                <td>
                    <a href="./?page=edit-product&id=<?= $product['id_product'] ?>"
                        class="btn btn-primary btn-sm">Edit</a>
                    <button type="button" class="btn btn-danger btn-sm" data-id="<?= $product['id_product'] ?>"
                        onclick="deleteProduct(this)">Delete</button>
                    <a href="./?page=view-comment&id=<?= $product['id_product'] ?>" class="btn btn-info btn-sm">View
                        Comment</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
function deleteProduct(button) {
    if (confirm("Bạn có chắc chắn muốn xóa sản phẩm này?")) {
        var productId = button.getAttribute('data-id');
        const url = "./?page=view-product&delete_id=" + productId
        window.location.href = url;
    }
}
</script>