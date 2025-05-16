<div class="modal-overlay" id="review-modal" style="display: none;">
    <div class="modal-container">
        <div class="review-close">&times;</div>
        <h3 class="text-center">Оставьте свой отзыв!</h3>
        <form class="review-form" id="review-form">
            <label class="review-label" for="name">Ваше имя:</label><br>
            <input placeholder="Имя" name='name' id='review-name' type="text" required><br>
            
            <label class="review-label" for="email">Email:</label><br>
            <input  placeholder="Email" name='email' id='review-email' type="email"><br>
            
            <label class="review-label" for="phone">Телефон:</label><br>
            <input  placeholder="Телефон" name='phone' id='review-phone' type="tel"><br>
            
            <label class="review-label" for="comment">Ваш отзыв:</label><br>
            <textarea id='review-comment' name="comment" required></textarea><br>
            
            <label for="rating">Оценка:</label><br>
            <div class="rating_button">
                <select id="review-rating" name="rating" required>
                <option value="">Выберите оценку</option>
                <option value="5">5 ★</option>
                <option value="4">4 ★</option>
                <option value="3">3 ★</option>
                <option value="2">2 ★</option>
                <option value="1">1 ★</option>
            </select> 
            
            <button class=" review_button" type="submit">Отправить отзыв</button>
            </div>
           
        </form>
    </div>
</div>