<?php
require 'libs/PHPMailer/Exception.php';
require 'libs/PHPMailer/PHPMailer.php';
require 'libs/PHPMailer/SMTP.php';
require 'models/pdo.php';
require 'models/reset_password_temp.php';



$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
$host = $_SERVER['SERVER_NAME'];
$port = $_SERVER['SERVER_PORT'];
$script = $_SERVER['SCRIPT_NAME'];

$basePath = "$protocol://$host";
if (($protocol === 'http' && $port != 80) || ($protocol === 'https' && $port != 443)) {
    $basePath .= ":$port";
}

$basePath .= dirname($script);

if (isset($_POST['send'])) {
    $email = htmlentities($_POST['email']);
    $resetPasswordTemp = new ResetPasswordTemp();

    try {
        $resetPasswordTemp->sendResetEmail($email, $basePath);
    } catch (Exception $e) {
        echo "An error occurred: " . $e->getMessage();
    }
} else {
?>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Quên mật khẩu</h2>
                    <form method="post" action="" class="row g-3">
                        <div class="col-12">
                            <label for="inputEmail" class="form-label">Nhập địa chỉ Email của bạn</label>
                            <input type="email" class="form-control" id="inputEmail" name="email" required>
                        </div>
                        <div class="col-12">
                            <button type="submit" name="send" class="btn btn-primary">
                                Gửi Email <i class="fas fa-paper-plane ms-2"></i>
                            </button>
                        </div>
                    </form>
                    <div class="text-center mt-3">
                        <a href="./" class="btn btn-secondary">Quay lại trang chủ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>