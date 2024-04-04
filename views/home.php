<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Bạn muốn mua điện thoại</h1>
            <p class="lead fw-normal text-white-50 mb-0">Đến ngay shopdienthoai.com để sở hữu ngay điện thoại nào</p>
        </div>
    </div>
</header>
<!-- Section-->
<div class="container p-5">
    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./static/images/banner1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./static/images/banner2.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./static/images/banner3.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./static/images/banner4.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./static/images/banner5.png" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add-to-cart' && isset($_POST['id_product'])) {

    $id_product = $_POST['id_product'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    $product_exists = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id_product'] == $id_product) {
            $item['quantity']++;
            $product_exists = true;
            break;
        }
    }

    if (!$product_exists) {
        $_SESSION['cart'][] = array(
            'id_product' => $id_product,
            'quantity' => 1
        );
    }
}
?>

<section class="py-5">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php
require_once 'models/Product.php';
require_once 'controllers/ProductController.php';
require_once 'config/db_connection.php';

$productController = new ProductController();

$products = $productController->getAll();

$productCount = 0; 

foreach ($products as $product) {
    if ($productCount >= 4) {
        break; 
    }
    ?>
            <div class="col mb-5">
                <div class="card h-100">
                    <img class="card-img-top" src="uploads/<?php echo $product['image']; ?>" alt="Product Image" />
                    <div class="card-body p-4">
                        <div class="text-center">
                            <a href="./index.php?page=product-detail&id_product=<?php echo $product['id_product']; ?>"
                                class="text-decoration-none text-dark">
                                <h5 class="fw-bolder fs-6"><?php echo $product['name_product']; ?></h5>
                            </a>
                            <?php

                   echo '<span class="text-muted">' . number_format($product['price'], 3, ',', '.') . ' đ</span>';
                    ?>
                        </div>
                    </div>
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center">
                            <form action="./index.php?page=products" method="post">
                                <input type="hidden" name="id_product" value="<?php echo $product['id_product']; ?>">
                                <input type="hidden" name="action" value="add-to-cart">
                                <button type="submit" class="btn btn-outline-dark mt-auto">Thêm vào giỏ</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
    $productCount++; 
}
?>


        </div>
    </div>
</section>