<?php
require_once '../models/User.php';
require_once '../controllers/UserController.php';

global $pdo;

$userController = new UserController();

$userId = isset($_GET['id']) ? $_GET['id'] : null;


$user = null;  

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password']; 
    $email = $_POST['email'];
    $address = $_POST['address'];
    $role = $_POST['role'];

    if (empty($username)) {
        $errors['username'] = 'Vui lòng nhập tên đăng nhập';
    }

    if (empty($password)) {
        $errors['password'] = 'Vui lòng nhập mật khẩu';
    }

    if (empty($email)) {
        $errors['email'] = 'Vui lòng nhập email';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Email không hợp lệ';
    }

    if (empty($address)) {
        $errors['address'] = 'Vui lòng nhập địa chỉ';
    }

    if (empty($role)) {
        $errors['role'] = 'Vui lòng chọn vai trò';
    }

    if (empty($errors)) {
        $result = $userController->update($userId, $username, $password, $email, $address, $role);

        if ($result) {
            echo '<div class="container mt-4">
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <p>Sửa tài khoản thành công</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>';
        }

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
                            value="<?php echo $user ? $user['username'] : ''; ?>">
                        <?php if (isset($errors['username'])): ?>
                        <small class="text-danger"><?php echo $errors['username']; ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="password">Mật Khẩu:</label>
                        <input type="password" class="form-control" id="password" name="password"
                            value="<?php echo $user ? $user['pass'] : ''; ?> ">
                        <?php if (isset($errors['password'])): ?>
                        <small class="text-danger"><?php echo $errors['password']; ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="<?php echo $user ? $user['email'] : ''; ?>">
                        <?php if (isset($errors['email'])): ?>
                        <small class="text-danger"><?php echo $errors['email']; ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="address">Địa Chỉ:</label>
                        <input type="text" class="form-control" id="address" name="address"
                            value="<?php echo $user ? $user['address'] : ''; ?>">
                        <?php if (isset($errors['address'])): ?>
                        <small class="text-danger"><?php echo $errors['address']; ?></small>
                        <?php endif; ?>
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