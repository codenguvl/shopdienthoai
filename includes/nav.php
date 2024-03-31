<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="./">shopdienthoai</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="./">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?page=about">About</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="index.php?page=products">All Products</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                        <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                    </ul>
                </li>
            </ul>
            <?php if(isset($_SESSION['user'])) { ?>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-solid fa-user"></i></a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="index.php?page=account">Xem tài khoản</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><a href="logout.php" class="mx-3">
                                <button class="btn btn-outline-dark" type="submit">
                                    Đăng xuất
                                </button>
                            </a></li>
                    </ul>
                </li>
            </ul>
            <a href="index.php?page=cart">
                <button class="btn btn-outline-dark" type="submit">
                    <i class="bi-cart-fill me-1"></i>
                    Cart
                </button>
            </a>
            <?php } else { ?>
            <a href="index.php?page=login">
                <button class="btn btn-outline-primary" type="submit">
                    Đăng nhập
                </button>
            </a>
            <a href="index.php?page=register" class="mx-3">
                <button class="btn btn-outline-dark" type="submit">
                    Đăng ký
                </button>
            </a>
            <?php } ?>
        </div>
    </div>
</nav>