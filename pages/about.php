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
    
    <!-- Баннер страницы "О клубе" -->
    <section class="about-banner dark-section">
        <div class="section-divider divider-bottom"></div>
        <div class="about-banner-content" data-animate="fadeIn">
            <h1>О нашем клубе</h1>
            <p>Императорская Конюшня - это место, где встречаются традиции и современность, где каждая деталь создана для истинных ценителей конного искусства.</p>
            <a href="#history" class="btn">История клуба</a>
        </div>
    </section>

    <!-- История клуба -->
    <section id="history" class="history textured-section">
        <div class="section-divider wave-divider divider-top"></div>
        <div class="section-divider divider-bottom"></div>
        <div class="container">
            <h2 class="section-title" data-animate="fadeIn">Наша история</h2>
            <div class="history-timeline">
                <div class="timeline-item" data-animate="fadeIn">
                    <div class="timeline-year">2010</div>
                    <div class="timeline-content">
                        <h3>Основание клуба</h3>
                        <p>Начало нашей истории - небольшой конный клуб с 5 лошадьми и одной тренировочной площадкой. Именно тогда были заложены основы нашего подхода к работе с клиентами и животными.</p>
                    </div>
                </div>
                <div class="timeline-item" data-animate="fadeIn" style="animation-delay: 0.2s">
                    <div class="timeline-year">2013</div>
                    <div class="timeline-content">
                        <h3>Первые победы</h3>
                        <p>Наши воспитанники впервые приняли участие в региональных соревнованиях и заняли призовые места. Это стало отправной точкой для развития спортивного направления.</p>
                    </div>
                </div>
                <div class="timeline-item" data-animate="fadeIn" style="animation-delay: 0.4s">
                    <div class="timeline-year">2015</div>
                    <div class="timeline-content">
                        <h3>Новая территория</h3>
                        <p>Переезд на новую, более просторную территорию с современными конюшнями, манежем и прогулочными зонами. Количество лошадей увеличилось до 20.</p>
                    </div>
                </div>
                <div class="timeline-item" data-animate="fadeIn" style="animation-delay: 0.6s">
                    <div class="timeline-year">2018</div>
                    <div class="timeline-content">
                        <h3>Международное признание</h3>
                        <p>Наш клуб получил аккредитацию Международной федерации конного спорта (FEI). Начали проводить международные турниры и принимать гостей из-за рубежа.</p>
                    </div>
                </div>
                <div class="timeline-item" data-animate="fadeIn" style="animation-delay: 0.8s">
                    <div class="timeline-year">2023</div>
                    <div class="timeline-content">
                        <h3>Современный комплекс</h3>
                        <p>Завершение строительства нового комплекса с отелем, спа-центром и рестораном. Теперь "Императорская Конюшня" - это полноценный элитный клуб для всей семьи.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Миссия и ценности -->
    <section class="mission gold-section">
        <div class="section-divider diagonal-divider divider-top"></div>
        <div class="section-divider divider-bottom"></div>
        <div class="container">
            <h2 class="section-title" data-animate="fadeIn">Наша миссия</h2>
            <div class="mission-statement" data-animate="fadeIn">
                <p>"Императорская Конюшня создает пространство, где гармонично сочетаются любовь к лошадям, профессиональный спорт и комфортный отдых. Мы стремимся сохранять традиции конного искусства, внедряя при этом самые современные технологии содержания лошадей и обучения всадников."</p>
                <p data-animate="fadeIn" style="animation-delay: 0.2s">Наши ценности: уважение к животным, индивидуальный подход к каждому клиенту, постоянное развитие и бескомпромиссное качество во всем.</p>
                <a href="#" class="btn" data-animate="fadeIn" style="animation-delay: 0.4s">Узнать больше</a>
            </div>
        </div>
    </section>

    <!-- Наша команда -->
    <section class="team darker-section">
        <div class="section-divider curve-divider divider-top"></div>
        <div class="section-divider divider-bottom"></div>
        <div class="container">
            <h2 class="section-title" data-animate="fadeIn">Наша команда</h2>
            <div class="team-grid">
                <div class="team-member" data-animate="fadeIn">
                    <div class="member-photo" style="background-image: url('/assets/resources/img/gallery/team-1.png')">
                    </div>
                    <div class="member-info">
                        <h3>Александр Петров</h3>
                        <span class="member-position">Основатель и директор</span>
                        <p class="member-description">Мастер спорта по конкуру, тренер с 20-летним стажем. Создал клуб с нуля, превратив его в одно из самых престижных мест для конников.</p>
                        <a href="#" class="btn">Подробнее</a>
                    </div>
                </div>
                <div class="team-member" data-animate="fadeIn" style="animation-delay: 0.2s">
                    <div class="member-photo" style="background-image: url('/assets/resources/img/gallery/team-2.png')">
                    </div>
                    <div class="member-info">
                        <h3>Елена Смирнова</h3>
                        <span class="member-position">Главный тренер</span>
                        <p class="member-description">Чемпионка России по выездке, специалист по работе с детьми. Разработала уникальную методику обучения для начинающих.</p>
                        <a href="#" class="btn">Подробнее</a>
                    </div>
                </div>
                <div class="team-member" data-animate="fadeIn" style="animation-delay: 0.4s">
                    <div class="member-photo" style="background-image: url('/assets/resources/img/gallery/team-3.png')">
                    </div>
                    <div class="member-info">
                        <h3>Дмитрий Козлов</h3>
                        <span class="member-position">Ветеринарный врач</span>
                        <p class="member-description">Специалист с международной практикой. Обеспечивает здоровье и отличное состояние всех лошадей нашего клуба.</p>
                        <a href="#" class="btn">Подробнее</a>
                    </div>
                </div>
                <div class="team-member" data-animate="fadeIn" style="animation-delay: 0.6s">
                    <div class="member-photo" style="background-image: url('/assets/resources/img/gallery/team-4.png')">
                    </div>
                    <div class="member-info">
                        <h3>Ирина Волкова</h3>
                        <span class="member-position">Тренер по конкуру</span>
                        <p class="member-description">Призер международных соревнований, специалист по подготовке к турнирам. Ее ученики регулярно занимают призовые места.</p>
                        <a href="#" class="btn">Подробнее</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Галерея -->
    <section class="gallery textured-section">
        <div class="section-divider wave-divider divider-top"></div>
        <div class="section-divider divider-bottom"></div>
        <div class="container">
            <h2 class="section-title" data-animate="fadeIn">Фотогалерея</h2>
            <div class="gallery-grid">
                <div class="gallery-item" data-animate="fadeIn">
                    <img src="/assets/resources/img/gallery/gallery-1.png" alt="Конюшни">
                </div>
                <div class="gallery-item" data-animate="fadeIn" style="animation-delay: 0.2s">
                    <img src="/assets/resources/img/gallery/gallery-2.png" alt="Тренировка">
                </div>
                <div class="gallery-item" data-animate="fadeIn" style="animation-delay: 0.4s">
                    <img src="/assets/resources/img/gallery/gallery-3.png" alt="Прогулка">
                </div>
                <div class="gallery-item" data-animate="fadeIn" style="animation-delay: 0.6s">
                    <img src="/assets/resources/img/gallery/gallery-4.png" alt="Соревнования">
                </div>
                <div class="gallery-item" data-animate="fadeIn" style="animation-delay: 0.8s">
                    <img src="/assets/resources/img/gallery/gallery-5.png" alt="Детская группа">
                </div>
                <div class="gallery-item" data-animate="fadeIn" style="animation-delay: 1s">
                    <img src="/assets/resources/img/gallery/gallery-6.png" alt="Территория клуба">
                </div>
            </div>
            <div style="text-align: center; margin-top: 50px;" data-animate="fadeIn">
                <a href="#" class="btn">Посмотреть всю галерею</a>
            </div>
        </div>
    </section>


    <!-- MARK: Footer -->
    <footer class="dark-section">
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