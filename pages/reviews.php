<?php include($_SERVER['DOCUMENT_ROOT'] . '/pages/template/main/header.php')?>
 <?php include('../pages/template/forms/modal_review.php') ?>

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

                    <?php
                    $reviews = getAllReviews();

                    foreach($reviews as $review):
                    ?>
                    <div class="review">
                        <div class="review-header">
                            <div class="review-avatar">АС</div>
                            <div>
                                <div class="review-author"><? echo  $review['user_name']?></div>
                                <div class="review-date"><? echo $review['created_at'] ?></div>
                            </div>
                        </div>
                        <div class="review-text">
                           <? echo $review['comment'] ?>
                        </div>
                        <div class="rating">Оценка: <? echo str_repeat('★', $review['rating']) . str_repeat('☆', 5 - $review['rating']) ?>;</div>
                    </div>
                    <? endforeach; ?>
                   
                </div>
                
                <a href="#" id='add-review' class="add-review-btn">Оставить отзыв</a>
            </div>
        </div>
    </main>
    <script src="../assets/js/modules/review.js"></script>
   
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/pages/template/main/footer.php')?>
