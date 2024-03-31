<?php
require_once '../models/User.php';
require_once '../controllers/UserController.php';

global $pdo;

$userController = new UserController();

$userId = isset($_GET['id']) ? $_GET['id'] : null;

echo $userId;

$user = null;  

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password']; 
    $email = $_POST['email'];
    $address = $_POST['address'];
    $role = $_POST['role'];

    $result = $userController->update($userId, $username, $password, $email, $address, $role); 

    if ($result) {
        echo "<script>window.location.reload();</script>";
        exit();
    }
}
if ($userId) {
    $user = $userController->getById($userId);
}


?>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h2>Sửa Tài Khoản</h2>
                <form id="addUserForm" method="post">
                    <div class="form-group">
                        <label for="username">Tên Đăng Nhập:</label>
                        <input type="text" class="form-control" id="username" name="username"
                            value="<?php echo $user ? $user['username'] : ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Mật Khẩu:</label>
                        <input type="password" class="form-control" id="password" name="password"
                            value="<?php echo $user ? $user['pass'] : ''; ?> " required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="<?php echo $user ? $user['email'] : ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Địa Chỉ:</label>
                        <input type="text" class="form-control" id="address" name="address"
                            value="<?php echo $user ? $user['address'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="role">Vai Trò:</label>
                        <select class="form-control" id="role" name="role" required>
                            <option>Vui lòng chọn</option>
                            <option value="user" <?php echo $user && $user['role'] === 'user' ? 'selected' : ''; ?>>User
                            </option>
                            <option value="admin" <?php echo $user && $user['role'] === 'admin' ? 'selected' : ''; ?>>
                                Admin</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập Nhật</button>
                </form>
            </div>
        </div>
    </div>
</section>