<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>"Эквитэс" - Элитный конный клуб</title>
    <link rel="stylesheet" href="/assets/css/Template.css">
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/about.css">
    <link rel="stylesheet" href="/assets/css/novelty.css">
    <link rel="stylesheet" href="/assets/css/brands.css">
    <link rel="stylesheet" href="/assets/css/contact.css">
    <link rel="stylesheet" href="/assets/css/catalog.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- MARK: Header -->
    <?php include 'template/header.php'; ?>

    <script src="../assets/js/modules/menu.js"></script>

    <section class="catalog-banner dark-section">
        <div class="banner-content">
        </div>
        <div class="section-divider divider-bottom"></div>
    </section>

    <!-- Основное содержимое каталога -->
    <div class="container">
        <h2 class="catalog-title">Каталог услуг</h2>
        
        <!-- Фильтры -->
        <div class="filters-container">
            <div class="filter-box active">
                <span class="filter-title">Экипировка</span>
                <span class="filter-clear"><i class="fas fa-times"></i></span>
            </div>
            
            <div class="filter-box">
                <span class="filter-title">Услуги клуба</span>
                <span class="filter-clear"><i class="fas fa-times"></i></span>
            </div>
            
            <div class="filter-box">
                <span class="filter-title">Для лошади</span>
                <span class="filter-clear"><i class="fas fa-times"></i></span>
            </div>
            
            <div class="filter-box">
                <span class="filter-title">Аксессуары</span>
                <span class="filter-clear"><i class="fas fa-times"></i></span>
            </div>
        </div>
        
        <!-- Карточки товаров -->
        <div class="products-grid">
            <!-- Карточка 1 -->
            <div class="promotion-card">
                <div class="promotion-img" style="background-image: url('/assets/resources/img/cards/card_1.png')"></div>
                <div class="promotion-content">
                    <h3>Индивидуальное занятие с тренером</h3>
                    <p>Персональная тренировка с мастером спорта. Разбор техники, работа над ошибками.</p>
                    <a href="#" class="price-btn">15 000 ₽</a>
                </div>
            </div>
            
            <!-- Карточка 2 -->
            <div class="promotion-card">
                <div class="promotion-img" style="background-image: url('/assets/resources/img/cards/card_2.png')"></div>
                <div class="promotion-content">
                    <h3>Годовой абонемент</h3>
                    <p>Приобретите годовой абонимент и получите 2 месяца занятий в подарок + персональный шкафчик.</p>
                    <a href="#" class="price-btn">3 500 ₽</a>
                </div>
            </div>
            
            <!-- Карточка 3 -->
            <div class="promotion-card">
                <div class="promotion-img" style="background-image: url('/assets/resources/img/cards/card_3.png')"></div>
                <div class="promotion-content">
                    <h3>Семейный пакет</h3>
                    <p>Специальное предложение для семей скидка 25% на все занятия для членов одной семьи.</p>
                    <a href="#" class="price-btn">2 800 ₽</a>
                </div>
            </div>
            
            <!-- Карточка 4 -->
            <div class="promotion-card">
                <div class="promotion-img" style="background-image: url('/assets/resources/img/cards/card_4.png')"></div>
                <div class="promotion-content">
                    <h3>Аренда лошади для прогулки</h3>
                    <p>Продолжительность: 1 час Спокойные лошади, маршрут по живописным тропам.</p>
                    <a href="#" class="price-btn">2 000 ₽</a>
                </div>
            </div>
            
            <!-- Карточка 5 -->
            <div class="promotion-card">
                <div class="promotion-img" style="background-image: url('/assets/resources/img/cards/card_5.png')"></div>
                <div class="promotion-content">
                    <h3>Защитный шлем Samshield Shadowmatt</h3>
                    <p>Легкий шлем премиум-класса с технологией Multi-Density Foam для максимальной защиты. </p>
                    <a href="#" class="price-btn">4 200 ₽</a>
                </div>
            </div>
            
            <!-- Карточка 6 -->
            <div class="promotion-card">
                <div class="promotion-img" style="background-image: url('/assets/resources/img/cards/card_6.png')"></div>
                <div class="promotion-content">
                    <h3>Куртка для верховой езды Equiline Milano</h3>
                    <p>Водонепроницаемая мембранная куртка с утеплителем Primaloft. Светоотражающие элементы.</p>
                    <a href="#" class="price-btn">3 800 ₽</a>
                </div>
            </div>
            
            <!-- Карточка 7 -->
            <div class="promotion-card">
                <div class="promotion-img" style="background-image: url('/assets/resources/img/cards/card_7.png')"></div>
                <div class="promotion-content">
                    <h3>Перчатки Roeckl Chester</h3>
                    <p>Кожаные перчатки с гелевыми вставками для снижения вибрации. Усиленные зоны на пальцах и ладонях.</p>
                    <a href="#" class="price-btn">5 000 ₽</a>
                </div>
            </div>
            
            <!-- Карточка 8 -->
            <div class="promotion-card">
                <div class="promotion-img" style="background-image: url('/assets/resources/img/cards/card_8.png')"></div>
                <div class="promotion-content">
                    <h3>Защитный жилет Airowear Outlyne</h3>
                    <p>Легкий жилет с технологией "360° Protection". Автоматическая система надувания при падении. </p>
                    <a href="#" class="price-btn">6 500 ₽</a>
                </div>
            </div>
        </div>
    </div>

 <!-- MARK: Footer -->
    <?php include 'template/footer.php'; ?>

    <script src="../assets/js/modules/scroll_header.js"></script>
</body>
</html>