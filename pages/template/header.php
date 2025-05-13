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
                    <li><a href="/pages/about.php">О клубе</a></li>
                    <li><a href="/pages/catalog.php">Каталог</a></li>
                    <li><a href="/pages/discount.php">Акции</a></li>
                    <li><a href="/pages/novelty.php">Новинки</a></li>
                    <li><a href="/pages/brands.php">Бренды</a></li>
                    <li><a href="/pages/reviews.php">Отзывы</a></li>
                    <li><a href="/pages/contact.php">Контакты</a></li>
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