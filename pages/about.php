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
    <?php include 'template/header.php'; ?>

    <script src="../assets/js/modules/menu.js"></script>
    
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
    <?php include 'template/footer.php'; ?>

    <script src="../assets/js/modules/scroll_header.js"></script>
</body>
</html>