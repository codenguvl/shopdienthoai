<?php
$hasError = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];


    if (empty($fullName)) {
    $errorFullName = "Vui lòng nhập tên tài khoản";
    $hasError = true;
  }

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errorEmail = "Địa chỉ email không hợp lệ";
    $hasError = true;
  }


  if (strlen($password) < 8) {
    $errorPassword = "Mật khẩu phải có ít nhất 8 ký tự";
    $hasError = true;
  }

  if ($password !== $confirmPassword) {
    $errorConfirmPassword = "Mật khẩu và xác nhận mật khẩu không trùng khớp";
    $hasError = true;
  }


    if ($password !== $confirmPassword) {
        echo '<div class="container mt-4">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <p>Mật khẩu và xác nhận mật khẩu không trùng khớp</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>';
    }


    if (!$hasError) {
        require_once 'models/User.php';
        require_once 'controllers/UserController.php';

        $userController = new UserController();

        $role = "user";
        $result = $userController->register($fullName, $password, $email, '', $role);

        if ($result) {
            echo '<div class="container mt-4">
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <p>Đăng kí tài khoản thành công</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>';
        } else {
            echo '<div class="container mt-4">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <p>username hoặc email đã tồn tại trong hệ thống</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>';
        }
    }
}
?>


<section class="py-5">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-6">
                <h2 class="mb-4">Đăng kí</h2>
                <form method="POST">
                    <div class="mb-3">
                        <label for="fullName" class="form-label">Tên tài khoản</label>
                        <input type="text" name="fullName" class="form-control" id="fullName"
                            placeholder="Enter your full name">
                        <?php
if (isset($errorFullName)) {
  echo "<p class='text-danger mb-0' style='font-size: 12px; padding: 0'>". $errorFullName ."</p>";
}
?>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email">
                        <?php
if (isset($errorEmail)) {
  echo "<p class='text-danger mb-0' style='font-size: 12px; padding: 0'>". $errorEmail ."</p>";
}
?>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input type="password" name="password" class="form-control" id="password"
                            placeholder="Enter your password">
                        <?php
if (isset($errorPassword)) {
  echo "<p class='text-danger mb-0' style='font-size: 12px; padding: 0'>". $errorPassword ."</p>";
}
?>

                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Xác nhận mật khẩu</label>
                        <input type="password" name="confirmPassword" class="form-control" id="confirmPassword"
                            placeholder="Confirm your password">
                    </div>
                    <button type="submit" class="btn btn-dark">Register</button>
                </form>
            </div>
        </div>
    </div>
</section>