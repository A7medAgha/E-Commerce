<?php
require_once 'check_session.php';
?>
<header class="header header-intro-clearance header-3">
    <div class="header-top">
        <div class="container">
            <div class="header-top">
                <div class="container d-flex justify-content-end align-items-center" style="min-height: 40px;">
                    <?php if (isLoggedIn()): ?>
                        <span>Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
                    <?php else: ?>
                        <a href="login.php" style="font-weight: 500;">Sign In / Register</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="header-middle">
        <div class="container">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>

                <a href="index.php" class="logo" style="height: px; ">
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
                            <input type="search" class="form-control" name="q" id="q" placeholder="Search product ..." required>
                        </div>
                    </form>
                </div>
            </div>

            <div class="header-right">
                <?php if (isLoggedIn()): ?>
                    <div class="wishlist">
                        <a href="account.php" title="account">
                            <div class="icon">
                                <i class="icon-user"></i>
                            </div>
                            <p>Account</p>
                        </a>
                    </div>
                <?php endif; ?>
                
                <div class="wishlist">
                    <a href="wishlist.php" title="Wishlist">
                        <div class="icon">
                            <i class="icon-heart-o"></i>
                        </div>
                        <p>Wishlist</p>
                    </a>
                </div>

                <div class="dropdown cart-dropdown">
                    <a href="cart.php" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                        <div class="icon">
                            <i class="icon-shopping-cart"></i>
                        </div>
                        <p>Cart</p>
                    </a>
                </div>

                <div class="wishlist">
                    <a href="about.php" title="About Us">
                        <div class="icon">
                            <i class="icon-info-circle"></i>
                        </div>
                        <p>About Us</p>
                    </a>
                </div>

                <?php if (isLoggedIn()): ?>
                    <div class="wishlist">
                        <a href="handle_logout.php" title="Logout">
                            <div class="icon">
                                <i class="icon-sign-out"></i>
                            </div>
                            <p>Logout</p>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="header-bottom sticky-header">
            <div class="container d-none d-lg-flex justify-content-center">
                <ul class="menu sf-arrows">
                    <li><a href="laptops.php">Laptops</a></li>
                    <li><a href="gaming.php">Video Games</a></li>
                    <li><a href="tablet.php">Tablets</a></li>
                    <li><a href="phones.php">Smart Phones</a></li>
                    <li><a href="earpuds.php">Headphones Earbuds</a></li>
                    <li><a href="camera.php">Digital Cameras</a></li>
                    <li><a href="printer.php">Printers</a></li>
                    <li><a href="tv.php">Television</a></li>
                    <li><a href="speakers.php">Speaker</a></li>
                    <li><a href="watch.php">Smart watches</a></li>
                </ul>
            </div>
        </div>
    </div>
</header> 