<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop điện thoại</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="static/css/styles.css" rel="stylesheet" />
</head>

<body>
    <?php session_start();?>
    <?php include('includes/nav.php') ?>
    <?php
include 'config/db_connection.php';


$current_page = isset($_GET['page']) ? $_GET['page'] : '';
if (isset($_SESSION['current_page'])) {
    $current_page = $_SESSION['current_page'];
}

switch ($current_page) {
    case 'products':
        include 'views/products.php';
        break;
    case 'product-detail':
        include 'views/product-detail.php';
        break;
    case 'contact':
        include 'views/contact.php';
        break;
    case 'about':
        include 'views/about.php';
        break;
    case 'cart':
        include 'views/cart.php';
        break;
    case 'checkout':
        include 'views/checkout.php';
        break;
    case 'login':
        include 'views/login.php';
        break;
    case 'register':
        include 'views/register.php';
        break;
    case 'account':
        include 'views/account.php';
        break;
    case 'edit-account':
        include 'views/edit-account.php';
        break;
    case 'forgot-password':
        include 'views/forgot-password.php';
        break; 
    default:
        include 'views/home.php'; 
}
?>

    <?php include('includes/footer.php') ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</html>