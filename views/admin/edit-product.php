<?php
require_once '../models/Product.php';
require_once '../models/Category.php';
require_once '../controllers/ProductController.php';
require_once '../controllers/CategoryController.php';

global $pdo;

$productController = new ProductController(); 
$categoryController = new CategoryController(); 

$productId = isset($_GET['id']) ? $_GET['id'] : null;

$nameProduct = "";
$price = "";
$image = "";
$description = "";
$category_id = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nameProduct = $_POST['productName'];
    $price = $_POST['productPrice'];
    $description = $_POST['productDescription'];
    $category_id = $_POST['productCategory'];

    if(isset($_FILES['productImage']) && $_FILES['productImage']['size'] > 0) {
        $uploadDir = '../uploads/';
        $uploadedFile = $uploadDir . basename($_FILES['productImage']['name']);
        move_uploaded_file($_FILES['productImage']['tmp_name'], $uploadedFile);
        $image = basename($_FILES['productImage']['name']);
    } else {
        $product = $productController->getById($productId);
        if ($product) {
            $image = $product["image"];
        }
    }

    if (empty($nameProduct)) {
        $errorProductName = "Vui lòng nhập tên sản phẩm";
    }

    if (empty($price)) {
        $errorProductPrice = "Vui lòng nhập giá sản phẩm";
    }

    if (empty($description)) {
        $errorProductDescription = "Vui lòng nhập mô tả sản phẩm";
    }

    if (empty($errorProductName) && empty($errorProductPrice) && empty($errorProductImage) && empty($errorProductDescription)) {
        $result = $productController->update($productId, $nameProduct, $price, $image, $description, $category_id);
        if ($result) {
        echo "<script>window.location.reload();</script>";
        exit();
    }
    }

} else if ($productId) {
    $product = $productController->getById($productId);
    if ($product) {
        $nameProduct = $product["name_product"];
        $price = $product["price"];
        $image = $product["image"];
        $description = $product["description"];
        $category_id = $product["id_cate"];
    }
}

$categories = $categoryController->getAll(); 
?>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h2>Chỉnh Sửa Sản Phẩm</h2>
                <form id="editProductForm" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="productName">Tên Sản Phẩm:</label>
                        <input type="text" class="form-control" id="productName" name="productName"
                            value="<?= $nameProduct ?>">
                        <?php if (isset($errorProductName)) : ?>
                        <p class="text-danger"><?php echo $errorProductName; ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="productPrice">Giá Sản Phẩm:</label>
                        <input type="number" class="form-control" id="productPrice" name="productPrice" min="0"
                            value="<?= $price ?>">
                        <?php if (isset($errorProductPrice)) : ?>
                        <p class="text-danger"><?php echo $errorProductPrice; ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="productImage">Ảnh Sản Phẩm:</label>
                        <input type="file" class="form-control-file" id="productImage" name="productImage">
                    </div>
                    <div class="form-group">
                        <label for="productDescription">Mô Tả Sản Phẩm:</label>
                        <input type="hidden" id="productDescription" name="productDescription">
                        <div class="form-control" id="text-edit"></div>
                        <?php if (isset($errorProductDescription)) : ?>
                        <p class="text-danger"><?php echo $errorProductDescription; ?></p>
                        <?php endif; ?>
                        <script>
                        const quill = new Quill('#text-edit', {
                            theme: 'snow'
                        });

                        quill.root.innerHTML = `<?= $description ?>`;

                        const form = document.getElementById('editProductForm');
                        form.addEventListener('submit', function(event) {
                            const productDescription = quill.root.innerHTML;
                            document.getElementById('productDescription').value =
                                productDescription;
                        });
                        </script>
                    </div>
                    <div class="form-group">
                        <label for="productCategory">Danh Mục Sản Phẩm:</label>
                        <select class="form-control" id="productCategory" name="productCategory">
                            <?php foreach ($categories as $category) : ?>
                            <option value="<?= $category['id_cate'] ?>"
                                <?= ($category['id_cate'] == $category_id) ? 'selected' : '' ?>>
                                <?= $category['name_cate'] ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </form>
            </div>
        </div>
    </div>
</section>