<?php
$hasError = false;
require_once '../models/Category.php';
require_once '../controllers/CategoryController.php';

global $pdo;

$categoryController = new CategoryController(); 

$categoryId = isset($_GET['id']) ? $_GET['id'] : null;

$nameCate = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nameCate = $_POST['name_cate'];
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $categoryId = $_GET['id']; 
    $nameCate = $_POST['name_cate']; 


if(empty($_POST['name_cate'])){
    $errorNameCate = "Vui lòng nhập tên danh mục";
    $hasError = true;
} else {
   $result = $categoryController->update($categoryId, $nameCate);
   if ($result) {
        echo "<script>window.location.reload();</script>";
        exit();
    }
  if ($result) {
            echo '<div class="container mt-4">
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <p>Sửa danh mục thành công</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>';
        } 
}
}
} else if ($categoryId) {
  $category = $categoryController->getById($categoryId);
  if ($category) {
    $nameCate = $category["name_cate"];
  }
}

?>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h2>Sửa Danh Mục Sản Phẩm</h2>
                <form method="post">
                    <div class="form-group">
                        <label for="name_cate">Tên Danh Mục:</label>
                        <input type="text" class="form-control" id="name_cate" name="name_cate"
                            value="<?= $nameCate ?>">
                        <?php
if (isset($errorNameCate)) {
  echo "<p class='text-danger mb-0' style='font-size: 12px; padding: 0'>". $errorNameCate ."</p>";
}
?>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
</section>