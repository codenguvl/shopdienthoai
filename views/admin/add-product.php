<?php
require_once '../models/Product.php'; 
require_once '../controllers/ProductController.php'; 
require_once '../controllers/CategoryController.php';

$productController = new ProductController();
$categoryController = new CategoryController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productDescription = $_POST['productDescription'];
    $categoryId = $_POST['productCategory'];

    $uploadDir = '../uploads/';
    $uploadedFile = $uploadDir . basename($_FILES['productImage']['name']);
    move_uploaded_file($_FILES['productImage']['tmp_name'], $uploadedFile);
    $productImage = basename($_FILES['productImage']['name']);

    $result = $productController->create($productName, $productPrice, $productImage, $productDescription, $categoryId); // Thêm đối số id_cate vào hàm create()
}

$categories = $categoryController->getAll();

?>


<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h2>Thêm Sản Phẩm</h2>
                <form id="addProductForm" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="productName">Tên Sản Phẩm:</label>
                        <input type="text" class="form-control" id="productName" name="productName" required>
                    </div>
                    <div class="form-group">
                        <label for="productPrice">Giá Sản Phẩm:</label>
                        <input type="number" class="form-control" id="productPrice" name="productPrice" min="0"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="productImage">Ảnh Sản Phẩm:</label>
                        <input type="file" class="form-control-file" id="productImage" name="productImage" required>
                    </div>
                    <div class="form-group">
                        <label for="productDescription">Mô Tả Sản Phẩm:</label>
                        <textarea class="form-control" id="productDescription" name="productDescription"
                            rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="productCategory">Danh Mục Sản Phẩm:</label>
                        <select class="form-control" id="productCategory" name="productCategory">
                            <?php foreach ($categories as $category) : ?>
                            <option value="<?= $category['id_cate'] ?>"><?= $category['name_cate'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </form>
            </div>
        </div>
    </div>
</section>