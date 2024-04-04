<?php
$hasError = false;
require_once '../models/Category.php';
require_once '../controllers/CategoryController.php';

global $pdo;

$categoryController = new CategoryController(); 

$name_cate = isset($_POST['name_cate']) ? $_POST['name_cate'] : '';

if(isset($_POST['name_cate'])){
    if(empty($_POST['name_cate'])){
    $errorNameCate = "Vui lòng nhập tên danh mục";
    $hasError = true;
} else {
  $result = $categoryController->create($name_cate);
  if ($result) {
            echo '<div class="container mt-4">
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <p>Thêm danh mục thành công</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>';
        } 
}
}

?>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h2>Thêm Danh Mục Sản Phẩm</h2>
                <form method="post">
                    <div class="form-group">
                        <label for="name_cate">Tên Danh Mục:</label>
                        <input type="text" class="form-control" id="name_cate" name="name_cate">
                        <?php
if (isset($errorNameCate)) {
  echo "<p class='text-danger mb-0' style='font-size: 12px; padding: 0'>". $errorNameCate ."</p>";
}
?>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </form>
            </div>
        </div>
    </div>
</section>