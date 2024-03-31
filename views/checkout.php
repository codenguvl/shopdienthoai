<?php

if (isset($_POST['remove_product_id'])) {
    $product_id_to_remove = $_POST['remove_product_id'];
    foreach ($_SESSION['cart'] as $key => $cart_item) {
        if ($cart_item['id_product'] === $product_id_to_remove) {
            unset($_SESSION['cart'][$key]);
            break;
        }
    }
    header("Location: ./index.php?page=cart");
    exit;
}

if (isset($_POST['clear_cart'])) {
    unset($_SESSION['cart']);
    header("Location: ./index.php?page=cart");
    exit;
}

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<div class='container p-5'>Giỏ hàng của bạn rỗng.</div>";
    exit;
}

$cart_items = $_SESSION['cart'];

$total_price = 0;

require_once 'config/db_connection.php';
require_once 'models/Product.php';
require_once 'controllers/ProductController.php';

$productController = new ProductController();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["checkout"])) {
    require_once 'models/Order.php';
    require_once 'models/DetailOrder.php';
    require_once 'controllers/OrderController.php';
    require_once 'controllers/DetailOrderController.php';

    $orderController = new OrderController();
    $detailOrderController = new DetailOrderController();

    $user_id = 1; 
    $address = $_POST["address"];
    $ship = $_POST["ship"];
    $sum_price = $total_price;

    $order_created = $orderController->createOrder($user_id, $address, $ship, $sum_price);

    if ($order_created) {
        $last_order_id = $pdo->lastInsertId();

        foreach ($cart_items as $cart_item) {
            $product_id = $cart_item['id_product'];
            $quantity = $cart_item['quantity'];
            $product = $productController->getById($product_id);

            if ($product) {
                $name_product = $product['name_product'];
                $price = $product['price'];

                $detail_order_created = $detailOrderController->createDetailOrder($last_order_id, $product_id, $name_product, $price);

            }
        }

        unset($_SESSION['cart']);

        header("Location: ./success.php");
        exit;
    } else {
        echo "Có lỗi xảy ra trong quá trình thanh toán. Vui lòng thử lại.";
        exit;
    }
}

?>

<section class="py-5">
    <div class="container px-4 px-lg-5">
        <h2 class="display-4 fw-bolder text-center mb-5">Thanh toán</h2>
        <div class="row">
            <div class="col-lg-6">
                <h4 class="mb-3">Danh sách sản phẩm:</h4>
                <ul class="list-group mb-3">
                    <?php $total_price = 0; ?>
                    <?php foreach ($cart_items as $cart_item): ?>
                    <?php
                        $product_id = $cart_item['id_product'];
                        $quantity = $cart_item['quantity'];
                        $product = $productController->getById($product_id);
                        if (!$product) {
                            continue;
                        }
                        $product_name = $product['name_product'];
                        $product_price = $product['price'];
                        $item_total_price = $product_price * $quantity;
                        $total_price += $item_total_price;
                        ?>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0"><?= $product_name ?></h6>
                            <small class="text-muted">Số lượng: <?= $quantity ?></small>
                        </div>
                        <span class="text-muted"><?= number_format($item_total_price) ?> đ</span>
                    </li>
                    <?php endforeach; ?>

                    <li class="list-group-item d-flex justify-content-between">
                        <span>Tổng tiền (VNĐ)</span>
                        <strong><?= $total_price ?> đ</strong>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6">
                <h4 class="mb-3">Thông tin thanh toán:</h4>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="address">Địa chỉ giao hàng:</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="form-group">
                        <label for="ship">Phí vận chuyển:</label>
                        <input type="text" class="form-control" id="ship" name="ship" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg" name="checkout">Đặt hàng</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>