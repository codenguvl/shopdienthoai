<?php
require 'libs/PHPMailer/Exception.php';
require 'libs/PHPMailer/PHPMailer.php';
require 'libs/PHPMailer/SMTP.php';
require('models/pdo.php');
require('models/reset_password_temp.php');
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <?php
                        $resetPassword = new ResetPasswordTemp();
                        $resetPassword->processPasswordReset();
                        ?>
                </div>
            </div>
        </div>
    </div>
</div>