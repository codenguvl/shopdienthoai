<?php
include('config/db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["email"]) && !empty($_POST["email"])) {
        $email = $_POST["email"];

        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$email) {
            $error = "<p>Invalid email address please type a valid email address!</p>";
        } else {

            $key = md5(uniqid(rand(), true));

            $expDate = date("Y-m-d H:i:s", strtotime('+1 day')); 
            $sql = "INSERT INTO password_reset_temp (email, `key`, expDate) VALUES ('$email', '$key', '$expDate')";
            if (mysqli_query($con, $sql)) {
                $reset_link = "https://www.example.com/reset-password.php?key=$key&email=$email&action=reset";
                $subject = "Password Reset Request";
                $message = "Please click on the following link to reset your password: $reset_link";
                $headers = "From: your_email@example.com";
                if (mail($email, $subject, $message, $headers)) {
                    echo "<div class='alert alert-success'>An email has been sent with instructions to reset your password.</div>";
                } else {
                    echo "<div class='alert alert-danger'>Failed to send email. Please try again later.</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Error: " . mysqli_error($con) . "</div>";
            }
        }
    } else {
        echo "<div class='alert alert-danger'>Email is required.</div>";
    }
}
?>




<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        Forgot Password
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    placeholder="Enter your email">
                            </div>
                            <button type="submit" class="btn btn-primary">Reset Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>