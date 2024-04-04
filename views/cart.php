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

echo '<section class="py-5">
  <div class="container px-4 px-lg-5">
    <h2 class="display-4 fw-bolder text-center mb-5">Giỏ hàng của bạn</h2>
    <div class="row">
      <div class="col-lg-8">
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead class="table-light">
              <tr>
                <th scope="col">Sản phẩm</th>
                <th scope="col">Giá</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Tổng</th>
                <th scope="col">Thao tác</th>
              </tr>
            </thead>
            <tbody>';

foreach ($cart_items as $cart_item) {
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

  echo "<tr>
  <td>$product_name</td>
  <td>" . number_format($product_price, 3, ',', '.') . " đ</td>
  <td>$quantity</td>
  <td>" . number_format($item_total_price, 3, ',', '.') . " đ</td>
  <td>
    <form action=\"\" method=\"post\" style=\"display: inline;\">
      <input type=\"hidden\" name=\"remove_product_id\" value=\"$product_id\">
      <button type=\"submit\" class=\"btn btn-danger btn-sm\">Xóa</button>
    </form>
  </td>
</tr>";
}

echo '</tbody>
          </table>
        </div>
        <form action="" method="post">
          <input type="hidden" name="clear_cart" value="1">
          <button type="submit" class="btn btn-danger">Xóa giỏ hàng</button>
        </form>
      </div>
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body">
            <h5 class="card-title">Tổng giá trị giỏ hàng</h5>
            <hr>
            <p class="card-text">Tổng: ' . number_format($total_price, 3, ',', '.') . 'đ</p>
            <a href="#" class="btn btn-dark">Thanh toán</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>';
?>