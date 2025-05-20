<!-- Modal view -->
<div id="loginModal" class="modal">
    <div class="modal-content">
        <span class="close-modal">&times;</span>
        <h2>Авторизация</h2>
        <form id="loginForm">
            <div class="input-group">
                <input type="email" id="loginEmail" name="email" placeholder=" " required>
                <label for="loginEmail">
                    <i class="fas fa-envelope"></i> Email
                </label>
            </div>
            
            <div class="input-group">
                <input type="password" id="loginPassword" name="password" placeholder=" " required>
                <label for="loginPassword">
                    <i class="fas fa-lock"></i> Пароль
                </label>
            </div>
            
            <button type="submit" class="submit-btn">Войти</button>
            
            <div class="auth-links">
                <a href="#register" id="registerLink">Регистрация</a>
                <a href="#forgot-password" id="forgotPasswordLink">Забыли пароль?</a>
            </div>
            
            <div id="loginMessage" class="message"></div>
        </form>
    </div>
</div>

<!-- Modal view recovery account -->
<div id="forgotPasswordModal" class="modal">
    <div class="modal-content">
        <span class="close-modal">&times;</span>
        <h2>Восстановление пароля</h2>
        <form id="forgotPasswordForm">
            <div class="input-group">
                <input type="email" id="forgot-email" name="email" placeholder=" " required>
                <label for="forgot-email">
                    <i class="fas fa-envelope"></i> Email
                </label>
            </div>
            <button type="submit" class="submit-btn">Отправить</button>
            
            <div class="auth-links">
                <a href="#login" id="backToLoginLink">Вернуться к авторизации</a>
            </div>
            
            <div id="forgotPasswordMessage" class="message"></div>
        </form>
    </div>
</div>

<!-- Modal view registration -->
<div id="registerModal" class="modal">
    <div class="modal-content">
        <span class="close-modal">&times;</span>
        <h2>Регистрация</h2>
        <form id="registerForm">
            <div class="input-group">
                <input type="text" id="name" name="name" placeholder=" " required>
                <label for="name">
                    <i class="fas fa-user"></i> Имя
                </label>
            </div>
            
            <div class="input-group">
                <input type="text" id="last_name" name="last_name" placeholder=" ">
                <label for="last_name">
                    <i class="fas fa-user"></i> Фамилия
                </label>
            </div>
            
            <div class="input-group">
                <input type="email" id="email" name="email" placeholder=" " required>
                <label for="email">
                    <i class="fas fa-envelope"></i> Email
                </label>
            </div>
            
            <div class="input-group">
                <input type="password" id="password" name="password" placeholder=" " required>
                <label for="password">
                    <i class="fas fa-lock"></i> Пароль
                </label>
            </div>
            
            <div class="input-group">
                <input type="tel" id="phone" name="phone" placeholder=" ">
                <label for="phone">
                    <i class="fas fa-phone"></i> Телефон
                </label>
            </div>
            
            <button type="submit" class="submit-btn">Зарегистрироваться</button>
            
            <div class="auth-links">
                <a href="#login" id="backToLoginFromRegisterLink">Уже есть аккаунт? Войти</a>
            </div>
            
            <div id="registerMessage" class="message"></div>
        </form>
    </div>
</div>

<!-- Modal view Admin PinCode Verification -->
<div id="adminPinModal" class="modal"> 
    <div class="modal-content">
        <span class="close-modal">&times;</span>
        <h2>Подтверждение доступа</h2>
        <p>Введите пин-код для входа в админ-панель</p>
        <form id="adminPinForm">
            <div class="input-group">
                <input type="password" id="adminPin" name="pin" maxlength="4" required>
                <label for="adminPin">Пин-код</label>
                <div class="highlight"></div>
            </div>
            <button type="submit" class="submit-btn">Подтвердить</button>
        </form>
        <div id="pinMessage"></div>
    </div>
</div>