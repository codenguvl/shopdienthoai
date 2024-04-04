<?php
$id_product = "";
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

<?php
$id_cate = "";
require_once 'models/Product.php';
require_once 'models/Comment.php';
require_once 'controllers/ProductController.php';
require_once 'controllers/CommentController.php';
require_once 'config/db_connection.php';

if (isset($_GET['id_product'])) {
    $id_product = $_GET['id_product'];

    $productController = new ProductController();

    $product = $productController->getById($id_product);

    $id_cate = $product['id_cate'];

    if ($product) {
        ?>
<section class="py-5">
    <div class="container px-4">
        <div class="row gx-4 gx-lg-5 align-items-start">
            <div class="col-md-6">
                <img class="card-img-top mb-5 mb-md-0" src="uploads/<?php echo $product['image']; ?>"
                    alt="Product Image">
            </div>
            <div class="col-md-6">
                <h2 class="display-5 fw-bolder"><?php echo $product['name_product']; ?></h2>
                <div class="fs-5 mb-3">
                    <?php

                            echo '<span>' . number_format($product['price'], 0, ',', '.') . '.000 đ</span>';
                            ?>
                </div>
                <p class="lead"><?php echo $product['description']; ?></p>
                <div class="d-flex">
                    <form method="post">
                        <input type="hidden" name="id_product" value="<?php echo $product['id_product']; ?>">
                        <input type="hidden" name="action" value="add-to-cart">
                        <button type="submit" class="btn btn-outline-dark mt-auto">Thêm vào giỏ</button>
                    </form>
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



<?php
if (isset($_SESSION['user'])) {
    echo '<section class="container px-4 px-lg-5">
            <div class="container px-4">
                <h3>Thêm bình luận</h3>
                <form method="post">
                    <input type="hidden" name="action" value="add-comment">
                    <input type="hidden" name="id_product" value="' . $id_product . '">
                    <div class="form-group">
                        <label for="comment">Nội dung bình luận:</label>
                        <textarea class="form-control" id="comment" name="content" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Gửi</button>
                </form>
            </div>
        </section>';
}
?>


<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add-comment' && isset($_POST['id_product'])) {
    $id_product = $_POST['id_product'];
    $content = $_POST['content'];

    $commentController = new CommentController();
    $result = $commentController->create($content, $_SESSION['user']['id_user'], $id_product, $_SESSION['user']['username']);
}

$commentController = new CommentController();
$id_product = $product['id_product'];
$comments = $commentController->getAll($id_product);


if ($comments) {
    echo "<section class='container px-4 px-lg-5'>";
    echo "<div class='container px-4 mt-3'>";
    echo "<h3>Bình luận</h3>";
    echo "<ul>";
    foreach ($comments as $comment) {
        echo "<li class='py-3'>";
        echo "<strong>Tên người dùng:</strong> " . $comment['username'] . "<br>";
        echo "<strong>Nội dung:</strong> " . $comment['content'];
        echo "</li>";
    }
    echo "</ul>";
    echo "</div>";
    echo "</section>";
} else {
    echo "<section class='container px-4 px-lg-5'><p class='container px-4 mt-3'>Chưa có bình luận nào.</p></section>";
}
?>

<section class="py-5">
    <div class="container px-4 px-lg-5">
        <h3 class="mb-5">Các sản phẩm liên quan</h3>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php
require_once 'config/db_connection.php';       
require_once 'models/Product.php';
require_once 'controllers/ProductController.php';

$productController = new ProductController();

$products = $productController->getFourByCategory($id_cate);

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
                                <button type="submit" class="btn btn-outline-dark mt-auto">Add to cart</button>
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