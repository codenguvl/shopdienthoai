<?php
require_once 'models/User.php';
require_once 'controllers/UserController.php';

$userController = new UserController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if(isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (empty($_POST["username"])) {
      $errorUsername = "Tên đăng nhập không được để trống";
   }

   if (empty($_POST["password"])) {
      $errorPass = "Mật khẩu không được để trống";
   }

        $user = $userController->login($username, $password);

        if ($user) {
         $_SESSION['user'] = $user;
         header("Location: index.php");
         exit(); 
         } else {
             echo '<div class="container mt-4">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <p>Sai tài khoản hoặc mật khẩu</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>';
         }
    }
}
?>



<!-- Login Form -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        Đăng nhập
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label">Tài khoản</label>
                                <input type="text" name="username" class="form-control" id="username"
                                    placeholder="Enter your username">
                                <?php
if (isset($errorUsername)) {
  echo "<p class='text-danger mb-0' style='font-size: 12px; padding: 0'>". $errorUsername ."</p>";
}
?>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Mật khẩu</label>
                                <input type="password" name="password" class="form-control" id="password"
                                    placeholder="Enter your password">
                                <?php
if (isset($errorPass)) {
  echo "<p class='text-danger mb-0' style='font-size: 12px; padding: 0'>". $errorPass ."</p>";
}
?>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                            <a href="index.php?page=forgot-password" class="btn btn-link">Forgot Password?</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>