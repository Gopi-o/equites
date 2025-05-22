<!-- MARK: Footer -->
 <?php 

 $contacts = getContacts();
 ?>
    <footer class="dark-section">
        <section class="transition-curve-2 gold-section">
            <div class="section-divider curve-divider divider-top"></div>
            <div class="section-divider divider-bottom"></div>
        </section>
        <div class="container">
            <div class="footer-grid">
                <div class="footer-column">
                    <h3>О клубе</h3>
                    <ul>
                        <li><a href="/pages/about.php/#history-club">История клуба</a></li>
                        <li><a href="/pages/about.php/#our-team">Наша команда</a></li>
                        <li><a href="/pages/about.php/#photo-gallery">Фотогалерея</a></li>
                        <li><a href="#">Новости</a></li>
                        <li><a href="#">Сертификаты</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Услуги</h3>
                    <ul>
                        <li><a href="/pages/catalog.php/#catalog">Обучение верховой езде</a></li>
                        <li><a href="/pages/catalog.php/#catalog">Прокат лошадей</a></li>
                        <li><a href="/pages/catalog.php/#catalog">Конные прогулки</a></li>
                        <li><a href="/pages/catalog.php/#catalog">Детские программы</a></li>
                        <li><a href="#">Соревнования</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Информация</h3>
                    <ul>
                        <li><a href="/pages/discount.php/#discounts">Акции</a></li>
                        <li><a href="/pages/reviews.php/#reviews">Отзывы</a></li>
                        <li><a href="/pages/brands.php/#brands">Бренды</a></li>
                        <li><a href="#">Блог</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Контакты</h3>
                    <ul>
                        <?php 
                        $contacts = getContacts();
                        $contact = $contacts['0'] ?>
                             <li><i class="fas fa-map-marker-alt"></i><? echo htmlspecialchars($contact['address']) ?></li>
                             <li><i class="fas fa-phone"></i><? echo htmlspecialchars($contact['phone']) ?></li>
                             <li><i class="fas fa-envelope"></i><? echo htmlspecialchars($contact['email']) ?></li>
                            <li><i class="fas fa-clock"></i> <? echo htmlspecialchars($contact['working_hours_weekdays']) ?></li>
                            <li><i class="fas fa-clock"></i> <? echo htmlspecialchars($contact['working_hours_weekends']) ?></li>
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
    <script src="/assets/js/template.js"></script>
    <script src="/assets/js/modules/cart.js"></script>
    <script src="/assets/js/modules/auth.js"></script>
</body>
</html>