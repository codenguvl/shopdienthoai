<?php
require_once '../models/Category.php';
require_once '../controllers/CategoryController.php';

global $pdo;

$categoryController = new CategoryController(); 

$name_cate = isset($_POST['name_cate']) ? $_POST['name_cate'] : '';

if(!empty($name_cate))
{
    $result = $categoryController->create($name_cate);
    if ($result > 0) {
  echo 'Thêm danh mục thành công!';
} else {
  echo 'Thêm danh mục thất bại!';
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
                        <input type="text" class="form-control" id="name_cate" name="name_cate" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </form>
            </div>
        </div>
    </div>
</section>