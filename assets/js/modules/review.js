document.addEventListener('DOMContentLoaded', function() {
        const reviewBtn = document.getElementById('add-review');
        const reviewModal = document.getElementById('review-modal');
        const reviewClose = document.querySelector('.review-close');

        
        // Открытие модального окна корзины
       reviewBtn.addEventListener('click', function() {
            reviewModal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        });
        
        // Закрытие модального окна
        function closeModal() {
            reviewModal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }
        
        reviewClose.addEventListener('click', closeModal);
   
    });