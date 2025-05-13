<<<<<<< Updated upstream
 // Скрипт для изменения фона хедера при скролле
        window.addEventListener('scroll', function() {
            const header = document.querySelector('header');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
=======
        // Улучшенный скрипт для бургер-меню
            const burgerMenu = document.getElementById('burgerMenu');
            const mobileMenu = document.getElementById('mobileMenu');
            
            burgerMenu.addEventListener('click', function() {
                this.classList.toggle('active');
                mobileMenu.classList.toggle('active');
            });
>>>>>>> Stashed changes
