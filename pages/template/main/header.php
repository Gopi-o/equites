<?php session_start(); ?>
<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/function.php') ?>

<?php $currentPage = $_SERVER['REQUEST_URI'];
              $menuItems = getMenuItems(); ?>
 
      
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>"Эквитэс" - Элитный конный клуб</title>
    <link rel="stylesheet" href="/assets/css/Template.css">
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/about.css">
    <link rel="stylesheet" href="/assets/css/catalog.css">
    <link rel="stylesheet" href="/assets/css/novelty.css">
    <link rel="stylesheet" href="/assets/css/brands.css">
    <link rel="stylesheet" href="/assets/css/contact.css">
    <link rel="stylesheet" href="/assets/css/review.css">
    <link rel="stylesheet" href="/assets/css/user-cabinet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- MARK: Header -->
    <header>
        <div class="header-container">
            <div class="logo-nav-container">
                <div class="logo-wrapper">
                    <a href="/index.php" class="logo-link">
                        <img class="logo-img" src="/assets/resources/img/Logo.png" alt="Конный клуб">
                    </a>
                </div>
                
                <div class="logo-text">
                    <span class="logo-main">Эквитес</span>
                    <span class="logo-sub">Конный клуб</span>
                </div>
                
                <div class="burger-menu" id="burgerMenu">
                    <i class="fas fa-bars"></i>
                </div>
            </div>
            
            <div class="header-actions">
                <div class="phone">
                    <i class="fas fa-phone"></i> <span>+7 (123) 456-78-90</span>
                </div>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-vk"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-facebook"></i></a>
                </div>
            </div>
        </div>
        
        <!-- Мобильное меню -->
        <div class="mobile-menu" id="mobileMenu">
            <nav>
                <ul>
                    <?php
                    foreach ($menuItems as $item) {
                        $activeClass = ($currentPage == $item['url']) ? 'active' : '';
                        echo "<li><a href='{$item['url']}' class='nav-link $activeClass'>{$item['title']}</a></li>";
                    }
                    ?>
                    <div class="user-actions">
                        <a href="/pages/user-cabinet.php" class="action-icon" title="Личный кабинет">
                            <i class="fas fa-user"></i>
                        </a>
                        <div class="action-icon" id="cart-icon" title="Корзина">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="cart-count">3</span>
                        </div>
                    </div>
                </ul>
            </nav>
        </div>
    </header>
    <?php include('../pages/template/forms/modal_review.php') ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/pages/template/forms/cart.php')?>
 
