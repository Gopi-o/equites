<?php include($_SERVER['DOCUMENT_ROOT'] . '/pages/template/main/header.php')?>

<!-- Main banner -->
<section class="banner dark-section">
    <div class="banner-content">
        <h1>Элитный конный клуб</h1>
        <p>Погрузитесь в мир изысканного конного спорта, где каждая деталь создана для вашего комфорта и удовольствия. Наши породистые лошади и профессиональные тренеры ждут вас.</p>
        <div class="banner-btns">
            <a href="#" class="btn">Записаться на занятия</a>
            <a href="#" class="btn">Посмотреть каталог</a>
        </div>
    </div>
    <div class="section-divider divider-bottom"></div>
</section>

<!-- Transition 1 (wave) -->
<section class="transition-wave textured-section">
    <div class="section-divider wave-divider divider-top"></div>
    <div class="section-divider divider-bottom"></div>
</section>

<!-- Advantages section -->
<section class="advantages">
    <div class="container">
        <h2 class="section-title">Наши преимущества</h2>
        <div class="advantages-grid">
            <div class="advantage-item">
                <div class="advantage-icon">
                    <i class="fas fa-horse-head"></i>
                </div>
                <h3>Породистые лошади</h3>
                <p>Только элитные породы лошадей, содержащиеся в идеальных условиях</p>
            </div>
            <div class="advantage-item">
                <div class="advantage-icon">
                    <i class="fas fa-award"></i>
                </div>
                <h3>Опытные тренеры</h3>
                <p>Мастера спорта и чемпионы с многолетним опытом преподавания</p>
            </div>
            <div class="advantage-item">
                <div class="advantage-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3>Безопасность</h3>
                <p>Современное оборудование и полная безопасность на всех этапах</p>
            </div>
            <div class="advantage-item">
                <div class="advantage-icon">
                    <i class="fas fa-gem"></i>
                </div>
                <h3>Эксклюзивность</h3>
                <p>Закрытый клуб с ограниченным количеством членов для максимального комфорта</p>
            </div>
        </div>
    </div>
</section>

<!-- Transition 2 (diagonal) -->
<section class="transition-diagonal gold-section">
    <div class="section-divider diagonal-divider divider-top"></div>
    <div class="section-divider divider-bottom"></div>
</section>

<!-- Promotions section -->
<section class="promotions">
    <div class="container">
        <h2 class="section-title">Эксклюзивные предложения</h2>
        <div class="promotions-grid">
            <?php
            $discounts = getDiscounts();
            $displayedDiscounts = 0;
            
            foreach ($discounts as $discount) {
                // Проверяем, что акция еще активна
                $endDate = new DateTime($discount['end_date']);
                $today = new DateTime();
                
                if ($endDate >= $today && $displayedDiscounts < 3) {
                    echo '<div class="promotion-card">';
                    echo '<div class="promotion-img">';
                    echo '<div class="promotion-img" style="background-image: url(\'/assets/resources/img/discount/' . htmlspecialchars($discount['image_url']) . '\')"></div>';
                    echo '</div>';
                    echo '<div class="promotion-content">';
                    echo '<h3>' . htmlspecialchars($discount['title']) . '</h3>';
                    echo '<p>' . htmlspecialchars($discount['description']) . '</p>';
                    echo '<a href="#" class="btn">Подробнее</a>';
                    echo '</div>';
                    echo '</div>';
                    
                    $displayedDiscounts++;
                }
            }
            
            if ($displayedDiscounts === 0) {
                echo '<p class="no-discounts">В данный момент нет активных акций. Следите за обновлениями!</p>';
            }
            ?>
        </div>
    </div>
</section>

<!-- Transition 3 (curve) -->
<section class="transition-curve darker-section">
    <div class="section-divider curve-divider divider-top"></div>
    <div class="section-divider divider-bottom"></div>
</section>

<section class="novelties">
    <div class="container">
        <h2 class="section-title">Новинки сезона</h2>
        <div class="novelties-grid">
            <div class="novelty-card">
                <div class="novelty-img">
                    <i class="fas fa-horse"></i>
                </div>
                <div class="novelty-content">
                    <h3>Новые жеребцы</h3>
                    <a href="#" class="btn novelty-btn-desktop">Подробнее</a>
                </div>
                <button class="novelty-btn-mobile">
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
            <div class="novelty-card">
                <div class="novelty-img">
                    <i class="fas fa-route"></i>
                </div>
                <div class="novelty-content">
                    <h3>Конные походы</h3>
                    <a href="#" class="btn novelty-btn-desktop">Подробнее</a>
                </div>
                <button class="novelty-btn-mobile">
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
            <div class="novelty-card">
                <div class="novelty-img">
                    <i class="fas fa-tshirt"></i>
                </div>
                <div class="novelty-content">
                    <h3>Экипировка</h3>
                    <a href="#" class="btn novelty-btn-desktop">Подробнее</a>
                </div>
                <button class="novelty-btn-mobile">
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
            <div class="novelty-card">
                <div class="novelty-img">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="novelty-content">
                    <h3>Мастер-классы</h3>
                    <a href="#" class="btn novelty-btn-desktop">Подробнее</a>
                </div>
                <button class="novelty-btn-mobile">
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Transition 4 (wave) -->
<section class="transition-wave-2 textured-section">
    <div class="section-divider wave-divider divider-top"></div>
    <div class="section-divider divider-bottom"></div>
</section>

<!-- Catalog section -->
<section class="catalog-preview">
    <div class="container">
        <h2 class="section-title">Наши услуги</h2>
        <div class="catalog-grid">
            <?php
            $services = query("
                SELECT product_id, name, description, price, image_url 
                FROM products 
                WHERE category = 'Услуги клуба' 
                LIMIT 3
            ");
            
            foreach ($services as $service) {
                echo '<div class="catalog-item">';
                if ($service['image_url']) {
                    echo '<img src="' . htmlspecialchars($service['image_url']) . '" alt="' . htmlspecialchars($service['name']) . '">';
                } else {
                    echo '<div style="background: #f5f5f5; height: 100%; display: flex; align-items: center; justify-content: center;">';
                    echo '<i class="fas fa-horse" style="font-size: 50px; color: #8B4513;"></i>';
                    echo '</div>';
                }
                echo '<div class="catalog-item-overlay">';
                echo '<h3>' . htmlspecialchars($service['name']) . '</h3>';
                echo '<a href="#" class="btn">Подробнее</a>';
                echo '</div>';
                echo '</div>';
            }
            
            if (empty($services)) {
                echo '<p class="no-services">В данный момент услуги недоступны. Приносим извинения за неудобства.</p>';
            }
            ?>
        </div>
    </div>
</section>

<!-- Transition 5 (diagonal) -->
<section class="transition-diagonal-2 dark-section">
    <div class="section-divider diagonal-divider divider-top"></div>
    <div class="section-divider divider-bottom"></div>
</section>

<!-- Reviews section -->
<section class="reviews">
    <div class="container">
        <h2 class="section-title">Отзывы членов клуба</h2>
        <div class="reviews-slider">
            <?php
            $reviews = getAllReviews();
            
            if (empty($reviews)) {
                // Если отзывов нет, выводим заглушку
                echo '<div class="review-card">';
                echo '<div class="review-header">';
                echo '<div class="review-avatar">К</div>';
                echo '<div class="review-name">Клуб Эквитес</div>';
                echo '</div>';
                echo '<p class="review-text">"Будьте первым, кто оставит отзыв о нашем клубе! Ваше мнение очень важно для нас."</p>';
                echo '<div class="review-rating">';
                echo '<i class="fas fa-star"></i>';
                echo '<i class="fas fa-star"></i>';
                echo '<i class="fas fa-star"></i>';
                echo '<i class="fas fa-star"></i>';
                echo '<i class="fas fa-star"></i>';
                echo '</div>';
                echo '</div>';
            } else {
                foreach ($reviews as $review) {
                    echo '<div class="review-card">';
                    echo '<div class="review-header">';
                    $initial = mb_substr($review['user_name'], 0, 1, 'UTF-8');
                    echo '<div class="review-avatar">' . htmlspecialchars($initial) . '</div>';
                    echo '<div class="review-name">' . htmlspecialchars($review['user_name']) . '</div>';
                    echo '</div>';
                    echo '<p class="review-text">"' . htmlspecialchars($review['comment']) . '"</p>';
                    echo '<div class="review-rating">';
                    // Выводим звезды рейтинга
                    for ($i = 1; $i <= 5; $i++) {
                        if ($i <= $review['rating']) {
                            echo '<i class="fas fa-star"></i>';
                        } else {
                            echo '<i class="far fa-star"></i>';
                        }
                    }
                    echo '</div>';
                    echo '</div>';
                }
            }
            ?>
        </div>
    </div>
</section>

<!-- Transition 6 (curve) -->
<section class="transition-curve-2 gold-section">
    <div class="section-divider curve-divider divider-top"></div>
    <div class="section-divider divider-bottom"></div>
</section>

<!-- About section -->
<section class="about-preview">
    <div class="container">
        <h2 class="section-title">Элитный конный клуб</h2>
        <p>Royal Stable - это не просто конный клуб, это сообщество ценителей прекрасного, где каждая деталь создана для того, чтобы вы могли наслаждаться общением с лошадьми в атмосфере роскоши и комфорта.</p>
        <p>Основанный в 2010 году, наш клуб стал домом для самых изысканных пород лошадей и местом, где встречаются истинные поклонники конного спорта.</p>
        <a href="#" class="btn">Подробнее о клубе</a>
    </div>
</section>

<!-- Transition 7 (wave) -->
<section class="transition-wave-3 darker-section">
    <div class="section-divider wave-divider divider-top"></div>
</section>

<!-- Contacts section -->
<section class="contacts">
    <div class="container">
        <h2 class="section-title">Как нас найти</h2>
        <div class="contacts-grid">
            <div class="contact-info">
                <h3>Контакты</h3>
                <?php
                $contacts = getContacts();
                $contact = $contacts['0'];
                ?>
              
                    <p><i class="fas fa-map-marker-alt"></i> <? echo htmlspecialchars($contact['address']) ?></p>
                    <p><i class="fas fa-phone"></i>  <? echo htmlspecialchars($contact['phone']) ?></p>
                    <p><i class="fas fa-envelope"></i> <? echo htmlspecialchars($contact['email']) ?></p>
                    <p><i class="fas fa-clock"></i>  <? echo htmlspecialchars($contact['working_hours_weekdays']) ?></p>
                    <p><i class="fas fa-clock"></i>  <? echo htmlspecialchars($contact['working_hours_weekends']) ?></p>
             
                <h3 style="margin-top: 30px;">Социальные сети</h3>
                <div class="social-icons" style="margin-top: 15px;">
                    <a href="#"><i class="fab fa-vk"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="map">
                <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; background: linear-gradient(45deg, #1A1916, #252320); color: var(--color-gold);">
                    <i class="fas fa-map-marked-alt" style="font-size: 50px;"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/pages/template/main/footer.php')?>