<?php include($_SERVER['DOCUMENT_ROOT'] . '/pages/template/main/header.php')?>
    


    <div class="wrapper">
        <div class="container">

            <div class="content">
                <div class="discount_block">
                    <h2 class="discount_title text-center">Акции</h2>
                    <div class="disconts_all">

                        <div class="discount_card card">

                            <img src="/assets/resources/img/discount/premium_membership.png" alt="">
                            <div class="card_body">
                                <div class="date">
                                 
                                    <p>01.05.2025-31.05.2025</p>
                                </div>
                                <h5>Членство Premium</h5>
                                <p>Станьте членом нашего клуба и получите эксклюзивные привилегии, включая персонального тренера и неограниченный доступ к конюшням. Специальное предложение - скидка 25% на первый месяц членства.</p>
                                <a class="button_dicsount" href="">Подробнее</a>
                            </div>
                        </div>
                        <div class="discount_card card">
    
                            <img src="/assets/resources/img/discount/annual_subscription.png" alt="">
                            <div class="card_body">
                                <div class="date">
                                 
                                    <p>01.04.2025 - 30.06.2025</p>
                                </div>
                                <h5>Годовой абонемент</h5>
                                <p>Приобретите годовой абонемент и получите 2 месяца занятий в подарок + персональный шкафчик. Акция действует для новых клиентов клуба. Оплата возможна в рассрочку.</p>
                                <a class="button_dicsount" href="">Подробнее</a>
                            </div>
                        </div>
                        <div class="discount_card card">
    
                            <img src="/assets/resources/img/discount/family_package.png" alt="">
                            <div class="card_body">
                                <div class="date">
                                 
                                    <p>01.05.2025 - 31.12.2025</p>
                                </div>
                                <h5>Семейный пакет</h5>
                                <p>Специальное предложение для семей: скидка 25% на все занятия для членов одной семьи. Минимальное количество участников - 2 человека. Действует на групповые и индивидуальные занятия.</p>
                                <a class="button_dicsount" href="">Подробнее</a>
                            </div>
                        </div>
                        <div class="discount_card card">
    
                            <img src="/assets/resources/img/discount/kids_groups.png" alt="">
                            <div class="card_body">
                                <div class="date">
                                 
                                    <p>15.05.2025 - 15.07.2025</p>
                                </div>
                                <h5>Детские группы</h5>
                                <p>Новые детские группы с профессиональными тренерами. Первое пробное занятие бесплатно! Специальная программа для детей от 5 до 14 лет. Группы формируются по возрасту и уровню подготовки.</p>
                                <a class="button_dicsount" href="">Подробнее</a>
                            </div>
                        </div>
                        <div class="discount_card card">
    
                            <img src="/assets/resources/img/discount/equipment_discount.png" alt="">
                            <div class="card_body">
                                <div class="date">
                                 
                                    <p>10.05.2025 - 10.06.2025</p>
                                </div>
                                <h5>Скидки на экипировку</h5>
                                <p>Скидка 15% на всю экипировку для верховой езды при покупке абонемента. В акции участвуют товары ведущих брендов: Pikeur, Cavallo, Equiline. Акция суммируется с другими скидками.</p>
                                <a class="button_dicsount" href="">Подробнее</a>
                            </div>
                        </div>
                        <div class="discount_card card">
    
                            <img src="/assets/resources/img/discount/weekend_special.png" alt="">
                            <div class="card_body">
                                <div class="date">
                                 
                                    <p>Специальные выходные</p>
                                </div>
                                <h5>Членство Premium</h5>
                                <p>Каждые выходные специальные цены на конные прогулки в парке. Групповые прогулки от 1500 руб. вместо 2000 руб. Индивидуальные прогулки - скидка 20%. Предварительная запись обязательна.</p>
                                <a class="button_dicsount" href="">Подробнее</a>
                            </div>
                        </div>
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