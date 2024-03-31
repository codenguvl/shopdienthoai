<?php
require_once '../config/db_connection.php';
require_once '../models/User.php';
require_once '../controllers/UserController.php';

$userController = new UserController();
$users = $userController->getAll();

if (isset($_GET['delete_id'])) {
  $deleteId = $_GET['delete_id'];
  echo $deleteId;
  $result = $userController->delete($deleteId);


  if ($result) {
    echo "<script>window.location.reload();</script>";
    exit();
  }
}

?>

<div class="container mt-4">
    <h2>Tài khoản</h2>
    <table id="datatablesSimple" class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Role</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody id="accTableBody">
            <?php foreach ($users as $user) : ?>
            <tr>
                <th scope="row"><?= $user['id_user'] ?></th>
                <td><?= $user['username'] ?></td>
                <td><?= $user['pass'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['address'] ?></td>
                <td><?= $user['role'] ?></td>
                <td>
                    <a href="./?page=edit-account&id=<?= $user['id_user'] ?>" class="btn btn-primary btn-sm">Edit</a>
                    <button type="button" class="btn btn-danger btn-sm" data-id="<?= $user['id_user'] ?>"
                        onclick="deleteAccount(this)">Delete</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
function deleteAccount(button) {
    if (confirm("Bạn có chắc chắn muốn xóa tài khoản này?")) {
        const accountId = button.dataset.id;

        const url = `./?page=view-account&delete_id=${accountId}`;
        window.location.href = url;
    }
}
</script>