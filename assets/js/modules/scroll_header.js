 // Скрипт для изменения фона хедера при скролле
        window.addEventListener('scroll', function() {
            const header = document.querySelector('header');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
        document.addEventListener('DOMContentLoaded', function() {
            const cartIcon = document.getElementById('cart-icon');
            const cartModal = document.getElementById('cart-modal');
            const modalClose = document.querySelector('.modal-close');
            const continueShopping = document.getElementById('continue-shopping');
            
            // Открытие модального окна корзины
            cartIcon.addEventListener('click', function() {
                cartModal.style.display = 'flex';
                document.body.style.overflow = 'hidden';
            });
            
            // Закрытие модального окна
            function closeModal() {
                cartModal.style.display = 'none';
                document.body.style.overflow = 'auto';
            }
            
            modalClose.addEventListener('click', closeModal);
            continueShopping.addEventListener('click', closeModal);
        });