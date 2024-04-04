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

<section class="py-3">
    <div class="container px-4 px-lg-5">
        <div class="row align-items-center">
            <div class="col-md-3 mb-3">
                <form action="index.php?page=search" method="post" class="d-flex">
                    <input class="form-control me-2" type="search" name="search_term" placeholder="Search products"
                        aria-label="Search">
                    <button class="btn btn-outline-dark" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php
            
require_once 'models/Product.php';
require_once 'controllers/ProductController.php';
require_once 'config/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search_term'])) {
    $search_term = trim($_POST['search_term']); 

    require_once 'models/Product.php';
    require_once 'controllers/ProductController.php';
    require_once 'config/db_connection.php';

    $productController = new ProductController();
    $products = $productController->searchByName($search_term);

} else {
    echo "Không có sản phẩm bạn tìm kiếm";
    exit();
}

foreach ($products as $product) {
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
}
?>

        </div>
    </div>
</section>