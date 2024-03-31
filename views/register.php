<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];


    if ($password !== $confirmPassword) {
        echo "Password and confirm password do not match";
        exit(); 
    }


    require_once 'models/User.php';
    require_once 'controllers/UserController.php';


    $userController = new UserController();


    $result = $userController->register($fullName, $password, $email, '');

    if ($result) {
        echo "Đăng kí tài khoản thành công"; 
    } else {
        echo "Đăng kí tài khoản thất bại"; 
    }
}
?>


<section class="py-5">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-6">
                <h2 class="mb-4">Register</h2>
                <form method="POST">
                    <div class="mb-3">
                        <label for="fullName" class="form-label">Full Name</label>
                        <input type="text" name="fullName" class="form-control" id="fullName"
                            placeholder="Enter your full name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password"
                            placeholder="Enter your password">
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" name="confirmPassword" class="form-control" id="confirmPassword"
                            placeholder="Confirm your password">
                    </div>
                    <button type="submit" class="btn btn-dark">Register</button>
                </form>
            </div>
        </div>
    </div>
</section>