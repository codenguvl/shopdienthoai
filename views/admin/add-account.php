<?php
$hasError = false;

include '../models/User.php';
include '../controllers/UserController.php';

$userController = new UserController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
  $username = $_POST['username'];
  $pass = $_POST['password']; 
  $email = $_POST['email'];
  $address = $_POST['address'];
  $role = $_POST['role'];

  if (empty($username)) {
        $errorFullName = "Vui lòng nhập tên tài khoản";
        $hasError = true;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorEmail = "Địa chỉ email không hợp lệ";
        $hasError = true;
    }

    if (strlen($pass) < 8) {
        $errorPassword = "Mật khẩu phải có ít nhất 8 ký tự";
        $hasError = true;
    }

    if (empty($address)) {
        $errorAddress = "Vui lòng nhập địa chỉ";
        $hasError = true;
    }

    if (!$hasError) {
$result = $userController->createAdmin($username, $pass, $email, $address, $role);
  if($result === false){
    echo '<div class="container mt-4">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>username hoặc email đã tồn tại trong hệ thống</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>';
    }
    if ($result) {
            echo '<div class="container mt-4">
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <p>Tạo tài khoản thành công</p>
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
                <h2>Thêm Tài Khoản</h2>
                <form id="addUserForm" method="post">
                    <div class="form-group">
                        <label for="username">Tên Đăng Nhập:</label>
                        <input type="text" class="form-control" id="username" name="username">
                        <?php
                        if (!empty($errorFullName)) {
                            echo "<p class='text-danger mb-0' style='font-size: 12px; padding: 0'>". $errorFullName ."</p>";
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="password">Mật Khẩu:</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <?php
                        if (!empty($errorPassword)) {
                            echo "<p class='text-danger mb-0' style='font-size: 12px; padding: 0'>". $errorPassword ."</p>";
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email">
                        <?php
                        if (!empty($errorEmail)) {
                            echo "<p class='text-danger mb-0' style='font-size: 12px; padding: 0'>". $errorEmail ."</p>";
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="address">Địa Chỉ:</label>
                        <input type="text" class="form-control" id="address" name="address">
                        <?php
                        if (!empty($errorAddress)) {
                            echo "<p class='text-danger mb-0' style='font-size: 12px; padding: 0'>". $errorAddress ."</p>";
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="role">Vai Trò:</label>
                        <select class="form-control" id="role" name="role" required>
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </form>
            </div>
        </div>
    </div>
</section>