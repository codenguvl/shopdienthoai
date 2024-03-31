<?php
if (!isset($_SESSION['user'])) {
    echo "Please log in to view your account details.";
    exit;
}
$user = $_SESSION['user'];
?>

<?php

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

  $result = $userObj->update($user['id_user'], $username, $user['pass'], $email, $address, $user['role']);


  if ($result) {
    $_SESSION['user']['username'] = $username;
    $_SESSION['user']['email'] = $email;
    $_SESSION['user']['address'] = $address;

    echo "Account updated successfully!";
  } else {
    echo "Failed to update account. Please try again.";
  }
}
?>

<div class="container p-5">
    <h2>Edit Account</h2>
    <form id="editAccountForm" method="POST">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username"
                value="<?php echo $user['username']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>"
                required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="<?php echo $user['address']; ?>"
                required>
        </div>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>