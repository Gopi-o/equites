<?php session_start(); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/pages/template/main/header.php');

    redirectIfNotLoggedIn();

    // $user = getUserById($_SESSION['id_user'] ?? null);

    $userId = $_SESSION['id_user'] ?? null;
    $user = getUserById($userId);

    $upcomingBookings = getUpcomingBookings($userId);
    $pastBookings = getPastBookings($userId);

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cancel_booking'])) {
        $bookingId = $_POST['booking_id'] ?? null;
        
        if ($bookingId && cancelBooking($bookingId, $userId)) {
            $_SESSION['success'] = 'Бронирование успешно отменено!';
        } else {
            $_SESSION['error'] = 'Не удалось отменить бронирование';
        }
        echo '<script>window.location.href = "/pages/user-cabinet.php";</script>';
        exit;
    }
?>


     <!-- Переход 2 (диагональ) -->
    <section class="transition-diagonal gold-section">
        <div class="section-divider diagonal-divider divider-top"></div>
        <div class="section-divider divider-bottom"></div>
    </section>

    <main>
        <div class="wrapper">
            <div class="container">
                <h1>Добро пожаловать, <?= htmlspecialchars($user['name']) ?>!</h1>
                
                <div class="profile-section">
                    <div>
                        <div class="profile-avatar">
                            <?= !empty($user['name']) ? mb_substr($user['name'], 0, 1) : '' ?>
                            <?= !empty($user['last_name']) ? mb_substr($user['last_name'], 0, 1) : '' ?>
                        </div>
                    </div>
                    <div class="profile-info">
                        <h2 class="profile-name">
                            <?= !empty($user['name']) ? htmlspecialchars($user['name']) : 'Имя не указано' ?>
                            <?= !empty($user['last_name']) ? htmlspecialchars($user['last_name']) : '' ?>
                        </h2>
                        <div class="profile-status">
                            Участник клуба с <?= !empty($user['registration_date']) ? date('Y', strtotime($user['registration_date'])) : 'неизвестного' ?> года
                        </div>
                        
                        <div class="profile-details">
                            <div class="detail-item">
                                <div class="detail-label">Телефон:</div>
                                <div class="detail-value"><?= !empty($user['phone']) ? htmlspecialchars($user['phone']) : 'Не указан' ?></div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Email:</div>
                                <div class="detail-value"><?= !empty($user['email']) ? htmlspecialchars($user['email']) : 'Не указан' ?></div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Статус:</div>
                                <div class="detail-value">
                                    <?= (!empty($user['role']) && $user['role'] === 'admin') ? 'Администратор' : 'Участник' ?>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Кнопка выхода -->
                        <form action="/assets/vendor/auth/logout.php" method="post" style="margin-top: 20px;">
                            <button type="submit" class="btn btn-outline">Выйти из аккаунта</button>
                        </form>
                        <?php if (!empty($user['role']) && $user['role'] === 'admin') { ?>
                            <button id="adminAccessBtn" class="admin-access-btn">Вход в админ-панель</button>
                        <?php } ?>
                    </div>
                </div>
                
                <h3 class="section-title">Предстоящие занятия</h3>
                <?php if (!empty($upcomingBookings)): ?>
                    <ul class="booking-list">
                        <?php foreach ($upcomingBookings as $booking): ?>
                            <li class="booking-item">
                                <h3 class="booking-title">Занятие с лошадью</h3>
                                <div class="booking-meta">
                                    <?= date('d.m.Y H:i', strtotime($booking['booking_date'])) ?>
                                    <?php if (!empty($booking['trainer_name'])): ?>
                                        · Тренер: <?= htmlspecialchars($booking['trainer_name']) ?>
                                    <?php endif; ?>
                                    <?php if (!empty($booking['horse_name'])): ?>
                                        · Лошадь: <?= htmlspecialchars($booking['horse_name']) ?>
                                    <?php endif; ?>
                                </div>
                                <span class="booking-status <?= strtolower($booking['status']) ?>">
                                    <?= $booking['status'] === 'confirmed' ? 'Подтверждено' : 'Ожидание' ?>
                                </span>
                                
                                <!-- Форма отмены -->
                                <form method="POST" style="display: inline;">
                                    <input type="hidden" name="booking_id" value="<?= $booking['booking_id'] ?>">
                                    <button type="submit" name="cancel_booking" class="btn btn-outline"
                                            onclick="return confirm('Вы уверены, что хотите отменить бронирование?')">
                                        Отменить
                                    </button>
                                </form>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p style="text-align: center; color: var(--color-text-light);">Нет предстоящих занятий</p>
                <?php endif; ?>
                
                <!-- Прошедшие занятия -->
                <h3 class="section-title">История бронирований</h3>
                <?php if (!empty($pastBookings)): ?>
                    <ul class="booking-list">
                        <?php foreach ($pastBookings as $booking): ?>
                            <li class="booking-item">
                                <h3 class="booking-title">Занятие с лошадью</h3>
                                <div class="booking-meta">
                                    <?= date('d.m.Y H:i', strtotime($booking['booking_date'])) ?>
                                    <?php if (!empty($booking['horse_name'])): ?>
                                        · Лошадь: <?= htmlspecialchars($booking['horse_name']) ?>
                                    <?php endif; ?>
                                </div>
                                <span class="booking-status completed">Завершено</span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p style="text-align: center; color: var(--color-text-light);">Нет завершенных занятий</p>
                <?php endif; ?>
                
                <div style="text-align: center; margin-top: 40px;">
                    <a href="/pages/booking.php" class="btn">Забронировать занятие</a>
                </div>
            </div>
        </div>
    </main>

    
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/pages/template/main/footer.php')?>