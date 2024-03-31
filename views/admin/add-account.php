<?php
include '../models/User.php';
include '../controllers/UserController.php';

$userController = new UserController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
  $username = $_POST['username'];
  $pass = $_POST['password']; 
  $email = $_POST['email'];
  $address = $_POST['address'];
  $role = $_POST['role'];

  $result = $userController->createAdmin($username, $pass, $email, $address, $role);
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
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Mật Khẩu:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Địa Chỉ:</label>
                        <input type="text" class="form-control" id="address" name="address">
                    </div>
                    <div class="form-group">
                        <label for="role">Vai Trò:</label>
                        <select class="form-control" id="role" name="role" required>
                            <option>Vui lòng chọn</option>
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