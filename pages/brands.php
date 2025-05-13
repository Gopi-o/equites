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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- MARK: Header -->
    <header>
        <div class="header-container">
            <div class="logo-nav-container">
                <div class="logo-wrapper">
                    <a href="/index.html" class="logo-link">
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
            <!-- Модальное окно корзины -->
            <div class="modal-overlay" id="cart-modal">
                <div class="modal-container">
                    <div class="modal-close">&times;</div>
                    <h2 class="modal-title">Ваша корзина</h2>
                    
                    <div class="cart-content">
                        <div class="cart-items">
                            <div class="cart-item">
                                <div class="cart-item-name">Абонемент на 10 занятий</div>
                                <div class="cart-item-price">25 000 ₽</div>
                            </div>
                            
                            <div class="cart-item">
                                <div class="cart-item-name">Персональная тренировка</div>
                                <div class="cart-item-price">5 000 ₽</div>
                            </div>
                            
                            <div class="cart-item">
                                <div class="cart-item-name">Фотосессия с лошадьми</div>
                                <div class="cart-item-price">12 000 ₽</div>
                            </div>
                            
                            <div class="cart-total">
                                Итого: <span>42 000 ₽</span>
                            </div>
                            
                            <div class="cart-actions">
                                <button class="cart-btn" id="continue-shopping">Продолжить выбор</button>
                                <button class="cart-btn cart-btn-primary">Оформить</button>
                            </div>
                        </div>
                        
                        <!-- Пример пустой корзины -->
                        <div class="empty-cart">
                            Ваша корзина пуста<br>
                            <button class="cart-btn" style="margin-top: 15px;">Выбрать услуги</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Мобильное меню -->
        <div class="mobile-menu" id="mobileMenu">
            <nav>
                <ul>
                    <li><a href="/pages/about.html">О клубе</a></li>
                    <li><a href="/pages/catalog.html">Каталог</a></li>
                    <li><a href="/pages/discount.html">Акции</a></li>
                    <li><a href="/pages/novelty.html">Новинки</a></li>
                    <li><a href="/pages/brands.html">Бренды</a></li>
                    <li><a href="/pages/reviews.html">Отзывы</a></li>
                    <li><a href="/pages/contact.html">Контакты</a></li>
                    <div class="user-actions">
                        <a href="/pages/user-cabinet.html" class="action-icon" title="Личный кабинет">
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

    <script>
        // Улучшенный скрипт для бургер-меню
            const burgerMenu = document.getElementById('burgerMenu');
            const mobileMenu = document.getElementById('mobileMenu');
            
            burgerMenu.addEventListener('click', function() {
                this.classList.toggle('active');
                mobileMenu.classList.toggle('active');
            });
    </script>


     <!-- Переход 2 (диагональ) -->
    <section class="transition-diagonal gold-section">
        <div class="section-divider diagonal-divider divider-top"></div>
        <div class="section-divider divider-bottom"></div>
    </section>



    <div class="content">
        <div class="heading"><h5>Наши партнеры</h5></div>


        <div class="partners">

            <div class="partner">
                <img src="../assets/resources/img/brands/logo_Pikeur.png" alt="pikeur">
                <p class="brand_p1">Pikeur</p>
                <p class="brand_p2">Германия</p>
                <a class="more" href="#">подробнее</a>
            </div>

            <div class="partner">
                <img src="../assets/resources/img/brands/logo_cavallo.png " alt="Cavallo">
                <p class="brand_p1">Cavallo</p>
                <p class="brand_p2">ОАЭ</p>
                <a class="more" href="#">подробнее</a>
            </div>

            <div class="partner">
                <img src="../assets/resources/img/brands/logo_wintec.png" alt="Winter 250">
                <p class="brand_p1">Winter 250</p>
                <p class="brand_p2">Австралия</p>
                <a class="more" href="#">подробнее</a>
            </div>

            <div class="partner">
                <img src="../assets/resources/img/brands/logo_airwear_outlyne.png" alt="Airwear Outlyne">
                <p class="brand_p1">Airwear Outlyne</p>
                <p class="brand_p2">Англия</p>
                <a class="more" href="#">подробнее</a>
            </div>

            <div class="partner">
                <img src="../assets/resources/img/brands/logo_gibert.png" alt="Gibert">
                <p class="brand_p1">Gibert</p>
                <p class="brand_p2">Германия</p>
                <a class="more" href="#">подробнее</a>
            </div>

            <div class="partner">
                <img src="../assets/resources/img/brands/Samshield logo.png" alt="Samshield">
                <p class="brand_p1">Samshield</p>
                <p class="brand_p2">Франция</p>
                <a class="more" href="#">подробнее</a>
            </div>


        </div>





    </div>
<!-- MARK: Footer -->
    <footer class="dark-section">
        <section class="transition-curve-2 gold-section">
            <div class="section-divider curve-divider divider-top"></div>
            <div class="section-divider divider-bottom"></div>
        </section>
        <div class="container">
            <div class="footer-grid">
                <div class="footer-column">
                    <h3>О клубе</h3>
                    <ul>
                        <li><a href="#">История клуба</a></li>
                        <li><a href="#">Наша команда</a></li>
                        <li><a href="#">Фотогалерея</a></li>
                        <li><a href="#">Новости</a></li>
                        <li><a href="#">Сертификаты</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Услуги</h3>
                    <ul>
                        <li><a href="#">Обучение верховой езде</a></li>
                        <li><a href="#">Прокат лошадей</a></li>
                        <li><a href="#">Конные прогулки</a></li>
                        <li><a href="#">Детские программы</a></li>
                        <li><a href="#">Соревнования</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Информация</h3>
                    <ul>
                        <li><a href="#">Акции</a></li>
                        <li><a href="#">Отзывы</a></li>
                        <li><a href="#">Бренды</a></li>
                        <li><a href="#">Блог</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Контакты</h3>
                    <ul>
                        <li><i class="fas fa-map-marker-alt"></i> г. Москва, Рублево-Успенское ш., д. 12</li>
                        <li><i class="fas fa-phone"></i> +7 (495) 123-45-67</li>
                        <li><i class="fas fa-envelope"></i> info@royal-stable.ru</li>
                        <li><i class="fas fa-clock"></i> Ежедневно с 8:00 до 22:00</li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>© 2025 ROYAL STABLE. Все права защищены.</p>
                <p><a href="#">Политика конфиденциальности</a> | <a href="#">Пользовательское соглашение</a></p>
                <p>Разработано в рамках учебной практики</p>
            </div>
        </div>
    </footer>

    <script>
        // Скрипт для изменения фона хедера при скролле
        window.addEventListener('scroll', function() {
            const header = document.querySelector('header');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
        document.addEventListener('DOMContentLoaded', function() {
            const cartIcon = document.getElementById('cart-icon');
            const cartModal = document.getElementById('cart-modal');
            const modalClose = document.querySelector('.modal-close');
            const continueShopping = document.getElementById('continue-shopping');
            
            // Открытие модального окна корзины
            cartIcon.addEventListener('click', function() {
                cartModal.style.display = 'flex';
                document.body.style.overflow = 'hidden';
            });
            
            // Закрытие модального окна
            function closeModal() {
                cartModal.style.display = 'none';
                document.body.style.overflow = 'auto';
            }
            
            modalClose.addEventListener('click', closeModal);
            continueShopping.addEventListener('click', closeModal);
        });
    </script>
</body>
</html>