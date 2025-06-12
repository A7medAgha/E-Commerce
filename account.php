<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cart</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <!--CSS Files -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
     <link rel="stylesheet" href="css/skins/skin-demo.css">
    <link rel="icon" href="images/demos/logo/favicon.png" type="image/x-icon">



</head>

<body>

    <div class="page-wrapper">
        <header class="header header-intro-clearance header-3">

            <div class="header-top">
                <div class="container">


                    <div class="header-top">
                        <div class="container d-flex justify-content-end align-items-center" style="min-height: 40px;">
                            <?php if (isset($_SESSION['user_id'])): ?>
                                <span>Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
                            <?php else: ?>
                                <a href="login.php" style="font-weight: 500;">Sign In / Register</a>
                            <?php endif; ?>
                        </div>
                    </div>
                    

                </div><!-- End .container -->
            </div><!-- End .header-top -->

            <div class="header-middle">
                <div class="container">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>

                        <a href="index.html" class="logo" style="height: px; ">
                            <img src="images/demos/logo/logo3.png" alt="Mo Logo" style="height: 40px; width: auto;">
                        </a>
                    </div>

                    <div class="header-center">
                        <div class="header-search header-search-extended header-search-visible d-none d-lg-block">
                            <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                            <form action="#" method="get">
                                <div class="header-search-wrapper search-wrapper-wide">
                                    <label for="q" class="sr-only">Search</label>
                                    <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                                    <input type="search" class="form-control" name="q" id="q"
                                        placeholder="Search product ..." required>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->
                    </div>

                    <div class="header-right">


                        <div class="wishlist">
                            <a href="account.html" title="account">
                                <div class="icon">
                                    <i class="icon-user"></i>
                                </div>
                                <p>Account</p>
                            </a>
                        </div>
                        <div class="wishlist">
                            <a href="wishlist.html" title="Wishlist">
                                <div class="icon">
                                    <i class="icon-heart-o"></i>
                                </div>
                                <p>Wishlist</p>
                            </a>
                        </div>

                        <div class="dropdown cart-dropdown">
                            <a href="cart.html" class="dropdown-toggle" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" data-display="static">
                                <div class="icon">
                                    <i class="icon-shopping-cart"></i>
                                </div>
                                <p>Cart</p>
                            </a>
                        </div>


                        <div class="wishlist">
                            <a href="about.html" title="Wishlist">
                                <div class="icon">
                                    <i class="icon-info-circle"></i>
                                </div>
                                <p>About Us</p>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="header-bottom sticky-header">
                    <div class="header-left">
                        <div class="dropdown category-dropdown">
                        </div><!-- End .category-dropdown -->
                    </div><!-- End .header-left -->

                    <div class="header-bottom sticky-header">
                        <div class="container d-none d-lg-flex justify-content-center">
                            <ul class="menu sf-arrows">
                                <li><a href="laptops.html">Laptops</a></li>
                                <li><a href="gaming.html">Video Games</a></li>
                                <li><a href="tablet.html">Tablets</a></li>
                                <li><a href="phones.html">Smart Phones</a></li>
                                <li><a href="earpuds.html">Headphones Earbuds</a></li>
                                <li><a href="camera.html">Digital Cameras</a></li>
                                <li><a href="printer.html">Printers</a></li>
                                <li><a href="tv.html">Television</a></li>
                                <li><a href="speakers.html">Speaker</a></li>
                                <li><a href="watch.html">Smart watches</a></li>
                            </ul>
                        </div>
                    </div>
                </div><!-- End .header-bottom -->
        </header><!-- End .header -->


        

        <main class="main">
            <div class="page-header text-center" style="background-image: url('images/page-header-bg.jpg')">
                <div class="container">
                    <h1 class="page-title">My Account<span>Shop</span></h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">

            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="dashboard">
                    <div class="container">
                        <div class="row">
                            <aside class="col-md-4 col-lg-3">
                                <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">



                                    <li class="nav-item">
                                        <a class="nav-link" id="tab-address-link" data-toggle="tab" href="#tab-address"
                                            role="tab" aria-controls="tab-address" aria-selected="false">Adresses</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account"
                                            role="tab" aria-controls="tab-account" aria-selected="false">Account
                                            Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="handle_logout.php">Sign Out</a>
                                    </li>
                                </ul>
                            </aside><!-- End .col-lg-3 -->

                            <div class="col-md-8 col-lg-9">
                                <div class="tab-content">
                                    <div class="tab-pane fade" id="tab-address" role="tabpanel"
                                        aria-labelledby="tab-address-link">
                                        <p>The following addresses will be used on the checkout by default.</p>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="card card-dashboard">
                                                    <div class="card-body">
                                                        <h3 class="card-title">Shipping Address</h3>

                                                        <p>User Name<br>
                                                            User Company<br>
                                                            Mohamed Ramadan<br>
                                                            Alexandria, alex Kleopatra<br>
                                                            1-234-987-6543<br>
                                                            mail@mail.com<br>
                                                            <a href="#">Edit <i class="icon-edit"></i></a>
                                                        </p>
                                                    </div><!-- End .card-body -->
                                                </div><!-- End .card-dashboard -->
                                            </div><!-- End .col-lg-6 -->
                                        </div><!-- End .row -->
                                    </div><!-- .End .tab-pane -->

                                    <div class="tab-pane fade" id="tab-account" role="tabpanel"
                                        aria-labelledby="tab-account-link">
                                        <form action="handle_update_account.php" method="post">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>First Name *</label>
                                                    <input type="text" name="first_name" class="form-control" value="<?php echo htmlspecialchars($_SESSION['user_name']); ?>" required>
                                                </div><!-- End .col-sm-6 -->

                                                <div class="col-sm-6">
                                                    <label>Last Name *</label>
                                                    <input type="text" name="last_name" class="form-control" value="<?php echo htmlspecialchars($_SESSION['user_lastname'] ?? ''); ?>" required>
                                                </div><!-- End .col-sm-6 -->
                                            </div><!-- End .row -->

                                            <label>Display Name *</label>
                                            <input type="text" name="display_name" class="form-control" value="<?php echo htmlspecialchars($_SESSION['user_name']); ?>" required>
                                            <small class="form-text">This will be how your name will be displayed in the
                                                account section and in reviews</small>

                                            <label>Email address *</label>
                                            <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($_SESSION['user_email']); ?>" required>

                                            <label>Current password (leave blank to leave unchanged)</label>
                                            <input type="password" name="current_password" class="form-control">

                                            <label>New password (leave blank to leave unchanged)</label>
                                            <input type="password" name="new_password" class="form-control">

                                            <label>Confirm new password</label>
                                            <input type="password" name="confirm_password" class="form-control mb-2">

                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>SAVE CHANGES</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>
                                        </form>
                                    </div><!-- .End .tab-pane -->
                                </div>
                            </div><!-- End .col-lg-9 -->
                        </div><!-- End .row -->
                    </div><!-- End .container -->
                </div><!-- End .dashboard -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

        <footer class="footer" >
            <div class="footer-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="widget widget-about">
                                <img src="images/demos/logo/logo3.png" class="-logo" alt="Logo"
                                    width="105" height="25">
                                <p>Discover the future of technology with top brands and exclusive
                                    deals.</p>
                                <div class="social-icons">
                                    <a href="https://www.facebook.com/" class="social-icon"
                                        target="_blank" title="Facebook"><i
                                            class="icon-facebook-f"></i></a>
                                    <a href="https://www.Twitter.com/" class="social-icon"
                                        target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
                                    <a href="https://www.Instagram.com/" class="social-icon"
                                        target="_blank" title="Instagram"><i
                                            class="icon-instagram"></i></a>
                                    <a href="https://www.Youtube.com/" class="social-icon"
                                        target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
                                    <a href="https://www.Pinterest.com/" class="social-icon"
                                        target="_blank" title="Pinterest"><i
                                            class="icon-pinterest"></i></a>
                                </div>
                            </div>
                        </div>
    
                        <div class="col-sm-6 col-lg-3">
                            <div class="widget">
                                <h4 class="widget-title">Top Categorys</h4>
                                <ul class="widget-list">
                                    <li><a href="laptops.html">Laptops</a></li>
                                    <li><a href="tablet.html">Tablets</a></li>
                                    <li><a href="tv.html">Television</a></li>
                                    <li><a href="phones.html">Smart Phones</a></li>
                                    <li><a href="gaming.html">Video Games</a></li>
                                </ul>
                            </div>
                        </div>
    
                        <div class="col-sm-6 col-lg-3">
                            <div class="widget">
                                <h4 class="widget-title">Useful Links</h4>
                                <ul class="widget-list">
                                    <li><a href="account.html">My Account</a></li>
                                    <li><a href="login.php">Sign In</a></li>
                                    <li><a href="cart.html">View Cart</a></li>
                                    <li><a href="wishlist.html">My Wishlist</a></li>
                                    <li><a href="about.html">About Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="footer-bottom">
                <div class="container">
                    <p class="footer-copyright">Copyright © NEXTRONICS Store. All Rights Reserved.</p>
                    <figure class="footer-payments">
                        <img src="images/demos/payments.png" alt="Payment methods" width="272"
                            height="20">
                    </figure>
                </div>
            </div>
        </footer>
    </div>
    
    
    <!-- Mobile Menu -->
    
    <div class="mobile-menu-container mobile-menu-light">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-close"></i></span>
    
    
            <form action="#" method="get" class="mobile-search">
                <label for="mobile-search" class="sr-only">Search</label>
                <input type="search" class="form-control" name="mobile-search" id="mobile-search"
                    placeholder="Search in..." required>
                <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
            </form>
    
            <ul class="nav nav-pills-mobile nav-border-anim" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="mobile-menu-link" data-toggle="tab"
                        href="#mobile-menu-tab" role="tab" aria-controls="mobile-menu-tab"
                        aria-selected="true">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="mobile-cats-link" data-toggle="tab" href="login.php" role="tab" aria-controls="mobile-cats-tab" aria-selected="false">Sign In</a>
                </li>
            </ul>
    
            <div class="tab-content">
                <div class="tab-pane fade show active" id="mobile-menu-tab" role="tabpanel"
                    aria-labelledby="mobile-menu-link">
                    <nav class="mobile-nav">
                        <ul class="mobile-menu">
                            <li><a href="laptops.html">Laptops</a></li>
                            <li><a href="phones.html">Smart Phones</a></li>
                            <li><a href="earpuds.html">Headphones Earbuds</a></li>
                            <li><a href="camera.html">Digital Cameras</a></li>
                            <li><a href="printer.html">Printers</a></li>
                            <li><a href="tv.html">Television</a></li>
                            <li><a href="speakers.html">Speaker</a></li>
                            <li><a href="watch.html">Smart watches</a></li>
                            <li><a href="gaming.html">Video Games</a></li>
                            <li><a href="tablet.html">Tablets</a></li>
    
    
                    </nav><!-- End .mobile-nav -->
                </div><!-- .End .tab-pane -->
    
            </div><!-- End .tab-content -->
    
            <div class="social-icons">
                <a href="https://www.facebook.com/" class="social-icon" target="_blank"
                    title="Facebook"><i class="icon-facebook-f"></i></a>
                <a href="https://www.Twitter.com/" class="social-icon" target="_blank"
                    title="Twitter"><i class="icon-twitter"></i></a>
                <a href="https://www.Instagram.com/" class="social-icon" target="_blank"
                    title="Instagram"><i class="icon-instagram"></i></a>
                <a href="https://www.Youtube.com/" class="social-icon" target="_blank"
                    title="Youtube"><i class="icon-youtube"></i></a>
            </div><!-- End .social-icons -->
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->

    <!-- Plugins JS File -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>


</html>