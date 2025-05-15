
<div class="modal-overlay" id="review-modal" style="display: none;">
    <div class="modal-container">
        <div class="review-close">&times;</div>
        <h3 class="text-center">Оставьте свой отзыв!</h3>
        <form class="review-form" id="review-form">
            <label class="review-label" for="name">Ваше имя*:</label><br>
            <input placeholder="Имя" name='user_name' id='review-name' type="text" required maxlength="50"><br>
            
            <label class="review-label" for="email">Email*:</label><br>
            <input placeholder="Email" name='email' id='review-email' type="email" required maxlength="50"><br>
            
            <label class="review-label" for="phone">Телефон:</label><br>
            <input placeholder="Телефон" name='phone' id='review-phone' type="tel" maxlength="20"><br>
            
            <label class="review-label" for="comment">Ваш отзыв*:</label><br>
            <textarea id='review-comment' name="comment" required maxlength="200" placeholder="Опишите ваш опыт..."></textarea><br>
            
            <label for="rating">Оценка*:</label><br>
            <div class="rating_button">
                <select id="review-rating" name="rating" required>
                    <option value="">Выберите оценку</option>
                    <option value="5">Отлично (5 ★)</option>
                    <option value="4">Хорошо (4 ★)</option>
                    <option value="3">Удовлетворительно (3 ★)</option>
                    <option value="2">Плохо (2 ★)</option>
                    <option value="1">Ужасно (1 ★)</option>
                </select> 
                
                <button class="review_button" type="submit">Отправить отзыв</button>
            </div>
            <div class="form-note">* - обязательные поля</div>
        </form>
    </div>
</div>
