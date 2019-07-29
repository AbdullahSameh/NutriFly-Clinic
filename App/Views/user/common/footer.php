
        <!-- Start Footer Section-->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="foot-img">
                        <img src="<?php echo reach('layout/images/nutrifly-logo3.png'); ?>">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="foot-link">
                        <h4><?php echo lang('navigation'); ?></h4>
                        <ul>
                            <li><i class="fas fa-angle-right"></i> <a href="<?php echo url('/') ?>"><?php echo lang('home'); ?></a></li>
                            <li><i class="fas fa-angle-right"></i> <a href="<?php echo url('/products') ?>"><?php echo lang('products'); ?></a></li>
                            <li><i class="fas fa-angle-right"></i> <a href="<?php echo url('/nutrtion-plan') ?>"><?php echo lang('nutrtion-plan'); ?></a></li>
                            <li><i class="fas fa-angle-right"></i> <a href="<?php echo url('/stories') ?>"><?php echo lang('success-stories'); ?></a></li>
                        </ul>
                    </div>
                </div>
                <!-- <div class="col-lg-3">
                    <div class="foot-product">
                        <h4><?php echo lang('category') ?></h4>
                        <ul>
                            <?php foreach ($variable as $key => $value) { ?>
                            <?php } ?>
                            <li><i class="fas fa-angle-right"></i> <a href="">Power</a></li>
                        </ul>
                    </div>
                </div> -->
                <div class="col-lg-4">
                    <div class="foot-contact">
                        <div class="call">
                            <h4><?php echo lang('contact-us'); ?></h4>
                            <ul>
                                <li><?php echo $settings['site_mobile']; ?></li>
                                <li><?php echo $settings['site_mobile2']; ?></li>
                                <li><?php echo $settings['site_email']; ?></li>
                            </ul>
                        </div>
                        <div class="follow">
                            <h4><?php echo lang('follow-us'); ?></h4>
                            <ul>
                                <li> <a href=""><i class="fab fa-facebook-f fa-fw"></i></a> </li>
                                <li> <a href=""><i class="fab fa-youtube fa-fw"></i></a> </li>
                                <li> <a href=""><i class="fab fa-instagram fa-fw"></i></a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> <!-- .row -->
        </div> <!-- .container -->
        <div class="dev-bar">
            Website By <a href="https://www.linkedin.com/in/abdullah-sameh/" target="_blank">Abdullah Sameh</a>
        </div>
    </footer>
        <!-- End Footer Section-->
    <script src="<?php echo reach('layout/js/jquery-3.2.1.min.js') ?>"></script>
    <script src="<?php echo reach('layout/js/popper.min.js') ?>"></script>
    <script src="<?php echo reach('layout/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo reach('layout/js/user-funcntion.js') ?>"></script>
</body>
</html>