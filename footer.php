<?php
require_once 'check_session.php';
?>
<footer class="footer">
    <div class="footer-newsletter bg-primary">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-xl-5 col-lg-6">
                    <div class="icon-box icon-box-side text-white">
                        <div class="icon-box-icon d-inline-flex">
                            <i class="w-icon-envelop3"></i>
                        </div>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title text-white font-weight-bold">Subscribe To Our Newsletter</h4>
                            <p class="text-white">Get all the latest information on Events, Sales and Offers.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6">
                    <form action="#" method="post" class="input-wrapper input-wrapper-inline input-wrapper-rounded">
                        <input type="email" class="form-control mr-2" name="email" id="email" placeholder="Your E-mail Address">
                        <button class="btn btn-dark btn-rounded" type="submit">Subscribe<i class="w-icon-long-arrow-right"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="widget widget-about">
                        <a href="index.php" class="logo-footer">
                            <img src="images/demos/logo/logo3.png" alt="Logo" width="144" height="45">
                        </a>
                        <div class="widget-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapibus lacus.</p>
                            <div class="social-icons social-icons-colored">
                                <a href="#" class="social-icon social-facebook" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="social-icon social-twitter" title="Twitter"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="social-icon social-instagram" title="Instagram"><i class="fab fa-instagram"></i></a>
                                <a href="#" class="social-icon social-youtube" title="Youtube"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget widget-collapsible">
                        <h3 class="widget-title">Top Categories</h3>
                        <ul class="widget-body filter-items search-ul">
                            <li><a href="laptops.php">Laptops</a></li>
                            <li><a href="tablet.php">Tablets</a></li>
                            <li><a href="tv.php">Television</a></li>
                            <li><a href="phones.php">Smart Phones</a></li>
                            <li><a href="gaming.php">Video Games</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget widget-collapsible">
                        <h3 class="widget-title">Useful Links</h3>
                        <ul class="widget-body filter-items search-ul">
                            <?php if (isLoggedIn()): ?>
                                <li><a href="account.php">My Account</a></li>
                            <?php endif; ?>
                            <li><a href="cart.php">View Cart</a></li>
                            <li><a href="wishlist.php">My Wishlist</a></li>
                            <li><a href="about.php">About Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <div class="widget widget-collapsible">
                        <h3 class="widget-title">Customer Service</h3>
                        <ul class="widget-body filter-items search-ul">
                            <li><a href="contact.php">Contact Us</a></li>
                            <li><a href="faq.php">FAQs</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-left">
                <p class="copyright">Copyright © 2024 NEXTRONICS Store. All Rights Reserved.</p>
            </div>
            <div class="footer-right">
                <span class="payment-label mr-lg-8">We're using safe payment for</span>
                <figure class="payment">
                    <img src="images/payment.png" alt="payment" width="159" height="25">
                </figure>
            </div>
        </div>
    </div>
</footer> 