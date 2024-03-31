<?php

require_once 'models/Product.php';
require_once 'controllers/ProductController.php';
require_once 'config/db_connection.php';

if (isset($_GET['id_product'])) {
    $id_product = $_GET['id_product'];

    $productController = new ProductController();

    $product = $productController->getById($id_product);

    if ($product) {
        ?>
<section class="py-5">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 align-items-start">
            <div class="col-md-6">
                <img class="card-img-top mb-5 mb-md-0" src="uploads/<?php echo $product['image']; ?>"
                    alt="Product Image">
            </div>
            <div class="col-md-6">
                <h2 class="display-5 fw-bolder"><?php echo $product['name_product']; ?></h2>
                <div class="fs-5 mb-3">
                    <?php

                            echo ' <span>$' . $product['price'] . '</span>';
                            ?>
                </div>
                <p class="lead"><?php echo $product['description']; ?></p>
                <div class="d-flex">
                    <input class="form-control me-3" type="number" value="1" min="1" max="10">
                    <button class="btn btn-outline-dark flex-shrink-0" type="button">
                        <i class="bi-cart-fill me-1"></i>
                        Add to cart
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
    } else {
        echo "<p>Sản phẩm không tồn tại.</p>";
    }
} else {
    echo "<p>Không có sản phẩm được chọn.</p>";
}
?>