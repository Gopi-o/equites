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
    <link rel="stylesheet" href="/assets/css/review.css">
    <link rel="stylesheet" href="/assets/css/user-cabinet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- MARK: Header -->
    <?php include 'template/header.php'; ?>

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
    <script src="../assets/js/modules/menu.js"></script>


     <!-- Переход 2 (диагональ) -->
    <section class="transition-diagonal gold-section">
        <div class="section-divider diagonal-divider divider-top"></div>
        <div class="section-divider divider-bottom"></div>
    </section>

    <main>
        <div class="wrapper">
            <div class="container">
                <h1>Добро пожаловать, Алексей!</h1>
                
                <div class="profile-section">
                    <div>
                        <div class="profile-avatar">КА</div>
                    </div>
                    <div class="profile-info">
                        <h2 class="profile-name">Кривилев Алексей</h2>
                        <div class="profile-status">Участник клуба с 2024 года</div>
                        
                        <div class="profile-details">
                            <div class="detail-item">
                                <div class="detail-label">Телефон:</div>
                                <div class="detail-value">+7 (123) 456-78-90</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Email:</div>
                                <div class="detail-value">anna@example.com</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Статус:</div>
                                <div class="detail-value">Gold Member</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <h3 class="section-title">Предстоящие занятия</h3>
                <ul class="booking-list">
                    <li class="booking-item">
                        <h3 class="booking-title">Индивидуальная тренировка</h3>
                        <div class="booking-meta">
                            15 мая 2025, 17:00 · Тренер: Иван Петров · Конь: Альфа
                        </div>
                        <span class="booking-status">Подтверждено</span>
                        <div style="margin-top: 15px;">
                            <a href="#" class="btn btn-outline">Перенести</a>
                            <a href="#" class="btn btn-outline">Отменить</a>
                        </div>
                    </li>
                    
                    <li class="booking-item">
                        <h3 class="booking-title">Групповое занятие</h3>
                        <div class="booking-meta">
                            18 мая 2025, 10:00 · Тренер: Елена Козлова
                        </div>
                        <span class="booking-status">Подтверждено</span>
                    </li>
                </ul>
                
                <h3 class="section-title">История бронирований</h3>
                <ul class="booking-list">
                    <li class="booking-item">
                        <h3 class="booking-title">Конная прогулка</h3>
                        <div class="booking-meta">
                            5 мая 2025, 14:00 · Маршрут: Лесная тропа
                        </div>
                        <span class="booking-status">Завершено</span>
                    </li>
                </ul>
                
                <div style="text-align: center; margin-top: 40px;">
                    <a href="#" class="btn">Забронировать занятие</a>
                </div>
            </div>

        </div>
    </main>

    
    <!-- MARK: Footer -->
    <?php include 'template/footer.php'; ?>

    <script src="../assets/js/modules/scroll_header.js"></script>
</body>
</html>