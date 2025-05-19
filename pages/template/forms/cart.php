<!-- Модальное окно корзины -->
    <div class="modal-overlay" id="cart-modal">
        <div class="modal-container">
            <div class="modal-close">&times;</div>
            <h2 class="modal-title">Ваша корзина</h2>
            
            <div class="cart-content">
                <div class="cart-items" id="cart-items-container">
                    <!-- Товары будут добавляться сюда динамически -->
                </div>
                
                <div class="cart-total">
                    Итого: <span id="cart-total-price">0 ₽</span>
                </div>
                
                <div class="cart-actions">
                    <button class="cart-btn" id="continue-shopping">Продолжить выбор</button>
                    <button class="cart-btn cart-btn-primary" id="checkout-btn">Оформить</button>
                </div>
                
                <!-- Сообщение о пустой корзине -->
                <div class="empty-cart" id="empty-cart-message">
                    Ваша корзина пуста<br>
                    <button class="cart-btn" style="margin-top: 15px;">Выбрать услуги</button>
                </div>
            </div>
        </div>
    </div>