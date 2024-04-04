<?php
require_once '../models/Product.php'; 
require_once '../models/Category.php'; 
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

    if (empty($productName)) {
        $errorProductName = "Vui lòng nhập tên sản phẩm";
    }

    if (empty($productPrice)) {
        $errorProductPrice = "Vui lòng nhập giá sản phẩm";
    }

    if (empty($productImage)) {
        $errorProductImage = "Vui lòng chọn ảnh sản phẩm";
    }

    if (empty($productDescription)) {
        $errorProductDescription = "Vui lòng nhập mô tả sản phẩm";
    }

    if (empty($errorProductName) && empty($errorProductPrice) && empty($errorProductImage) && empty($errorProductDescription)) {
        $result = $productController->create($productName, $productPrice, $productImage, $productDescription, $categoryId);
        if($result){
            echo '<div class="container mt-4">
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <p>Thêm tài khoản thành công</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>';
        }
    }
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
                        <input type="text" class="form-control" id="productName" name="productName">
                        <?php if (isset($errorProductName)) : ?>
                        <p class="text-danger"><?php echo $errorProductName; ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="productPrice">Giá Sản Phẩm:</label>
                        <input type="number" class="form-control" id="productPrice" name="productPrice" min="0">
                        <?php if (isset($errorProductPrice)) : ?>
                        <p class="text-danger"><?php echo $errorProductPrice; ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="productImage">Ảnh Sản Phẩm:</label>
                        <input type="file" class="form-control-file" id="productImage" name="productImage" required>
                        <?php if (isset($errorProductImage)) : ?>
                        <p class="text-danger"><?php echo $errorProductImage; ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="productDescription">Mô Tả Sản Phẩm:</label>
                        <div class="form-control" id="text-edit"></div>
                        <input type="hidden" id="productDescription" name="productDescription">
                        <?php if (isset($errorProductDescription)) : ?>
                        <p class="text-danger"><?php echo $errorProductDescription; ?></p>
                        <?php endif; ?>
                        <script>
                        const quill = new Quill('#text-edit', {
                            theme: 'snow'
                        });
                        const form = document.getElementById('addProductForm');
                        form.addEventListener('submit', function(event) {
                            const productDescription = quill.root.innerHTML;
                            document.getElementById('productDescription').value = productDescription;
                        });
                        </script>
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