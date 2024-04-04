<?php
if (!isset($_SESSION['user'])) {
    echo "Please log in to view your account details.";
    exit;
}
$user = $_SESSION['user'];
?>

<?php
$errors = [];
if (!isset($_SESSION['user'])) {
  echo "Please log in to update your account.";
  exit;
}

require_once 'models/User.php';
require_once 'controllers/UserController.php';
require_once 'config/db_connection.php';

$user = $_SESSION['user'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $username = trim($_POST['username']);
  $email = trim($_POST['email']);
  $address = trim($_POST['address']);
  $userObj = new User($pdo);

    if (empty($username)) {
        $errors['username'] = "Vui lòng nhập tên tài khoản";
    }

    if (empty($email)) {
        $errors['email'] = "Vui lòng nhập email";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Vui lòng nhập email hợp lệ";
    }

    if (empty($address)) {
        $errors['address'] = "Vui lòng nhập địa chỉ";
    }

    if (empty($errors)) {
        $result = $userObj->update($user['id_user'], $username, $user['pass'], $email, $address, $user['role']);


        if ($result) {
            $_SESSION['user']['username'] = $username;
            $_SESSION['user']['email'] = $email;
            $_SESSION['user']['address'] = $address;

            echo '<div class="container mt-4">
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <p>Cập nhật tài khoản thành công</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>';
        } else {
            echo '<div class="container mt-4">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <p>Cập nhật tài khoản thất bại</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>';
        }
    }
}
?>

<div class="container p-5">
    <h2>Chỉnh sửa tài khoản</h2>
    <form id="editAccountForm" method="POST">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username"
                value="<?php echo $user['username']; ?>">
            <?php
if (isset($errors['username'])) {
  echo "<p class='text-danger mb-0' style='font-size: 12px; padding: 0'>". $errors['username'] ."</p>";
}
?>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>">
            <?php
if (isset($errors['email'])) {
  echo "<p class='text-danger mb-0' style='font-size: 12px; padding: 0'>". $errors['email'] ."</p>";
}
?>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="<?php echo $user['address']; ?>">
            <?php
if (isset($errors['address'])) {
  echo "<p class='text-danger mb-0' style='font-size: 12px; padding: 0'>". $errors['address'] ."</p>";
}
?>
        </div>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>