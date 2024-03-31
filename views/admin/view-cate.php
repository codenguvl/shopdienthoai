<?php
require_once '../config/db_connection.php';
require_once '../controllers/CategoryController.php';

$categoryController = new CategoryController();
$categories = $categoryController->getAll();

if (isset($_GET['delete_id'])) {
  $deleteId = $_GET['delete_id'];
  $result = $categoryController->delete($deleteId);

  if ($result) {
    echo "<script>window.location.reload();</script>";
    exit();
  }
}

?>

<div class="container mt-4">
    <h2>Danh mục</h2>
    <table id="datatablesSimple" class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody id="categoryTableBody">
            <?php foreach ($categories as $category) : ?>
            <tr>
                <th scope="row"><?= $category['id_cate'] ?></th>
                <td><?= $category['name_cate'] ?></td>
                <td>
                    <a href="./?page=edit-cate&id=<?= $category['id_cate'] ?>" class="btn btn-primary btn-sm">Edit</a>
                    <button type="button" class="btn btn-danger btn-sm" data-id="<?= $category['id_cate'] ?>"
                        onclick="deleteCategory(this)">Delete</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
function deleteCategory(button) {
    if (confirm("Bạn có chắc chắn muốn xóa danh mục này?")) {
        const categoryId = button.dataset.id;
        const url = "./?page=view-cate&delete_id=" + categoryId;
        window.location.href = url;
    }
}
</script>