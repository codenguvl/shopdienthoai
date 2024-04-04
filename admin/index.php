<?php
session_start();

if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
  header('Location: login.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.4/dist/quill.snow.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.4/dist/quill.js"></script>
</head>

<body class="sb-nav-fixed">
    <?php include('../includes/nav-admin.php')?>
    <div id="layoutSidenav">
        <?php include('../includes/sidebar.php')?>
        <div id="layoutSidenav_content">
            <main>
                <?php
include '../config/db_connection.php';


$current_page = isset($_GET['page']) ? $_GET['page'] : '';
if (isset($_SESSION['current_page'])) {
    $current_page = $_SESSION['current_page'];
}

switch ($current_page) {
    case 'view-account':
        include '../views/admin/view-account.php';
        break;
    case 'view-cate':
        include '../views/admin/view-cate.php';
        break;
    case 'edit-cate':
        include '../views/admin/edit-cate.php';
        break;
    case 'view-product':
        include '../views/admin/view-product.php';
        break;
    case 'add-account':
        include '../views/admin/add-account.php';
        break;
    case 'edit-account':
        include '../views/admin/edit-account.php';
        break;
    case 'add-product':
        include '../views/admin/add-product.php';
        break;
    case 'edit-product':
        include '../views/admin/edit-product.php';
        break;
    case 'add-cate':
        include '../views/admin/add-cate.php';
        break;
    case 'register':
        include 'views/register.php';
        break;
    case 'login':
        include '../views/admin/login.php';
        break; 
    case 'view-comment':
        include '../views/admin/view-comment.php';
        break;  
    default:
        include '../views/admin/statistic.php'; 
}
?>

            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>