<?php
if (!isset($_SESSION['user'])) {
    echo "Please log in to view your account details.";
    exit;
}
$user = $_SESSION['user'];
?>


<div class="container p-5">
    <h1 class="h3 mb-3">My Account</h1>
    <div class="row">
        <div class="col-12">
            <div class="card account-info">
                <div class="card-body">
                    <h5 class="card-title">Account Details</h5>
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-bold">Username:</span>
                            <span id="username"><?php echo $user['username']; ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-bold">Email:</span>
                            <span id="email"><?php echo $user['email']; ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-bold">Address:</span>
                            <span id="address"><?php echo $user['address']; ?></span>
                        </li>
                    </ul>
                    <a href="index.php?page=edit-account" class="btn btn-primary">Edit Account</a>
                </div>
            </div>
        </div>
    </div>
</div>