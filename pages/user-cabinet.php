<?php include($_SERVER['DOCUMENT_ROOT'] . '/pages/template/main/header.php')?>


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

    
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/pages/template/main/footer.php')?>