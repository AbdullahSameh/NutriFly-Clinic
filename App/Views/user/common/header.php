<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="<?php echo reach('layout/css/bootstrap.min.css') ?>"/>
    <link rel="stylesheet" href="<?php echo reach('layout/css/fontawesome-all.min.css') ?>"/>
    <link rel="stylesheet" href="<?php echo reach('layout/css/front-end.css') ?>"/>
    <!-- Condition to add arabic style sheet -->
    <?php if (! isset($_SESSION['lang'])) { ?>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amiri&display=swap">
    <link rel="stylesheet" href="<?php echo reach("layout/css/front-end-ar.css")?>"/>
    <?php } ?>
    <?php if (isset($_SESSION['lang']) && $_SESSION['lang'] === 'ar') { ?>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amiri&display=swap">
    <link rel="stylesheet" href="<?php echo reach("layout/css/front-end-ar.css")?>"/>
    <?php } ?>

</head>
<body>

    <header class="header">
        <div class="upper-bar">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <div class="social">
                            <span><?php echo $settings['site_mobile']; ?> | </span>
                            <span><?php echo $settings['site_email']; ?></span>
                        </div>
                    </div>
                    <div class="col-6 text-right">
                        <div class="user">
                            <?php if(isset($_SESSION['login'])) { ?>
                                <span>
                                    <i class="fas fa-cog fa-fw"></i> 
                                    <?php
                                    echo $user->first_name . ' ' . $user->last_name;
                                    ?>
                                </span>
                                <ul class="drop-list">
                                    <li> <a href="<?php echo url('/profile') ?>"><?php echo lang('my-profile'); ?></a> </li>
                                    <li> <a href="<?php echo url('/orders') ?>"><?php echo lang('my-orders'); ?></a> </li>
                                    <li> <a href="<?php echo url('/logout') ?>"><?php echo lang('logout'); ?></a> </li>
                                </ul>
                            <?php } else { ?>
                                <a href="<?php echo url('/login') ?>">
                                    <i class="fas fa-lock"></i> 
                                    <?php echo lang('log-in'); ?>
                                </a>
                            <?php } ?>
                        </div> <!-- .user -->
                        
                        <div class="lang">
                            <span>
                                <!-- <i class="fas fa-globe fa-fw"></i> -->
                                <i class="fas fa-language fa-fw"></i>
                                <?php echo lang('language'); ?>
                            </span>
                            <ul class="drop-list">
                                <form method="POST">
                                    <li> <a href="<?php echo url('/lang/en') ?>">English</a> </li>
                                    <li> <a href="<?php echo url('/lang/ar') ?>">العربية</a> </li>
                                </form>
                            </ul>
                        </div> <!-- .lang -->
                    </div>
                </div> <!-- .row -->
            </div> <!-- .container -->
        </div> <!-- .upper-bar -->
        <div class="container">
            <nav class="navbar">
                <div class="hold-toggler">
                    <button class="nav-toggler">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
                <a class="navbar-brand" href="<?php echo url('/') ?>">
                    <img class="img-fluid" src="<?php echo reach('/layout/images/nutrifly-logo.png'); ?>">
                </a>
                <ul class="nav-list">
                    <li class="nav-page active">
                        <a href="<?php echo url('/') ?>" class="link-page"><?php echo lang('home'); ?></a>
                    </li>
                    <li class="nav-page">
                        <a href="<?php echo url('/products') ?>" class="link-page"><?php echo lang('products'); ?></a>
                    </li>
                    <li class="nav-page">
                        <a href="<?php echo url('/nutrtion-plan') ?>" class="link-page"><?php echo lang('nutrtion-plan'); ?></a>
                    </li>
                    <li class="nav-page">
                        <a href="<?php echo url('/stories') ?>" class="link-page"><?php echo lang('success-stories'); ?></a>
                    </li>
                    <li class="nav-page">
                        <a href="" data-link="<?php echo url('/') ?>" data-scroll="about" class="scroll-link link-page"><?php echo lang('about-us'); ?></a>
                    </li>
                    <li class="nav-page">
                        <a href="" data-link="<?php echo url('/') ?>" data-scroll="contact" class="scroll-link link-page"><?php echo lang('contact-us'); ?></a>
                    </li>
                </ul>
                <div class="cart-hold">
                    <a href="<?php echo url('/checkout'); ?>" class="cart-toggle">
                        <i class="fas fa-shopping-basket fa-fw fa-2x"></i>
                        <span class="cart-count">
                            <?php 
                            if (! empty($addToCart)) {
                                echo count($addToCart); 
                            } else {
                                echo '0';
                            }
                            ?>
                        </span>
                    </a>
                    <div class="cart-menu">
                        <?php
                            if (!empty($addToCart)) {
                        ?>
                            <ul class="shop-item">
                                <?php
                                $total = 0;                         
                                foreach ($addToCart as $c_key => $cart) { ?>
                                    <li>
                                        <a href="">
                                            <div class="cart-img">
                                                <img class="img-fluid" src="<?php echo reach('layout/images/test2.jpg'); ?>">
                                            </div>
                                            <div class="cart-info">
                                                <p><?php echo $cart['cart_name']; ?></p>
                                                <span><?php echo number_format($cart['cart_price'], 2) ?> <small><?php echo lang('egp'); ?></small></span> |
                                                <span><?php echo lang('quantity'); ?>: <?php echo $cart['cart_quantity']; ?></span>
                                            </div>
                                        </a>
                                    </li>
                    
                                <?php 
                                $total = $total + ($cart['cart_price'] * $cart['cart_quantity']);
                                } ?>
                            </ul>
                            <div class="cart-total">
                                <h4 class="text-center">
                                    <small><?php echo lang('total-amount'); ?>:</small>
                                    <strong><?php echo number_format($total, 2) ?></strong>
                                    <small><?php echo lang('egp'); ?></small>
                                </h4>
                            </div>
                            <div class="cart-btn">
                                <div><a href="<?php echo url('/shopping-cart'); ?>" class="second-btn"><?php echo lang('view-cart'); ?></a></div>
                                <div><a href="<?php echo url('/checkout'); ?>" class="second-btn"><?php echo lang('check-out'); ?></a></div>
                            </div>
                        <?php } else { ?>
                            <div class="no-cart">
                                <i class="fas fa-exclamation fa-fw fa-2x"></i>
                                <p><?php echo lang('cart-is-empty'); ?></p>
                            </div>
                        <?php } ?>
                    </div> <!-- .cart-menu -->
                </div>
            </nav>
        </div> <!-- .container -->
    </header>