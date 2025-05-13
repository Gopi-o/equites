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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- MARK: Header -->
    <?php include 'template/header.php'; ?>

    
    <script src="../assets/js/modules/menu.js"></script>


     <!-- Переход 2 (диагональ) -->
    <section class="transition-diagonal gold-section">
        <div class="section-divider diagonal-divider divider-top"></div>
        <div class="section-divider divider-bottom"></div>
    </section>

    <main>
        <div class="wrapper">
            <div class="container">
                <h1>Отзывы наших клиентов</h1>
                
                <div class="reviews-container">
                    <div class="review">
                        <div class="review-header">
                            <div class="review-avatar">АС</div>
                            <div>
                                <div class="review-author">Анна Смирнова</div>
                                <div class="review-date">15 мая 2025</div>
                            </div>
                        </div>
                        <div class="review-text">
                            "Прекрасный клуб с профессиональными тренерами. Занимаюсь здесь уже год, прогресс очевиден. Особенно нравится отношение к лошадям - видно, что о них действительно заботятся."
                        </div>
                        <div class="rating">Оценка: ★★★★★</div>
                    </div>
                    
                    <div class="review">
                        <div class="review-header">
                            <div class="review-avatar">ИП</div>
                            <div>
                                <div class="review-author">Иван Петров</div>
                                <div class="review-date">10 мая 2025</div>
                            </div>
                        </div>
                        <div class="review-text">
                            "Привожу сюда дочь на занятия. Тренеры умеют работать с детьми, нашли подход сразу. Ребенок в восторге от лошадей, ждет каждое занятие с нетерпением."
                        </div>
                        <div class="rating">Оценка: ★★★★☆</div>
                    </div>
                    
                    <div class="review">
                        <div class="review-header">
                            <div class="review-avatar">ЕК</div>
                            <div>
                                <div class="review-author">Елена Козлова</div>
                                <div class="review-date">5 мая 2025</div>
                            </div>
                        </div>
                        <div class="review-text">
                            "Отличное место для конных прогулок! Красивые маршруты, ухоженные лошади. Персонал внимательный и профессиональный. Рекомендую всем любителям природы и лошадей."
                        </div>
                        <div class="rating">Оценка: ★★★★★</div>
                    </div>
                </div>
                
                <a href="#" class="add-review-btn">Оставить отзыв</a>
            </div>
        </div>
    </main>

    <!-- MARK: Footer -->
    <?php include 'template/footer.php'; ?>

    <script src="../assets/js/modules/scroll_header.js"></script>
</body>
</html>