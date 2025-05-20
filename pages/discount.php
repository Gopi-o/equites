<?php include($_SERVER['DOCUMENT_ROOT'] . '/pages/template/main/header.php')?>
    


    <div class="wrapper">
        <div class="container">
            <div class="content">
                <div class="discount_block">
                    <h2 class="discount_title text-center">Акции</h2>
                    <div class="disconts_all">

                         <?php
                    
                    $discounts = getAllDiscount();

                    foreach($discounts as $discount):
                    ?>
                         <div class="discount_card card">

                            <img src="/assets/resources/img/discount/<? echo $discount['image_url']; ?>" alt="">
                            <div class="card_body">
                                <div class="date">
                                 
                                    <p><? echo $discount['start_date']; ?>-<? echo $discount['end_date']; ?></p>
                                </div>
                                <h5><? echo $discount['title']; ?></h5>
                                <p><? echo $discount['description']; ?></p>
                                <a class="button_dicsount" href="">Подробнее</a>
                            </div>
                        </div>
                    <? endforeach; ?>

                       
                      
                    </div>

                    <div class="pagination">
                        <span class="dot active">1</span>
                        <span class="dot">2</span>
                        <span class="dot">3</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Только для мобильных устройств
            if (window.innerWidth <= 768) {
                const dots = document.querySelectorAll('.pagination .dot');
                let currentPage = 0;
                
                // Функция переключения активной точки
                function setActiveDot(index) {
                    dots.forEach((dot, i) => {
                        dot.classList.toggle('active', i === index);
                    });
                    currentPage = index;
                }
                
                // Обработчики кликов для точек
                dots.forEach((dot, index) => {
                    dot.addEventListener('click', () => {
                        setActiveDot(index);
                    });
                });
                
                // Инициализация - активируем первую точку
                setActiveDot(0);
            }
        });
    </script>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/pages/template/main/footer.php')?>