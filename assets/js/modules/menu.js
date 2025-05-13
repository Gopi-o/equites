        // Улучшенный скрипт для бургер-меню
            const burgerMenu = document.getElementById('burgerMenu');
            const mobileMenu = document.getElementById('mobileMenu');
            
            burgerMenu.addEventListener('click', function() {
                this.classList.toggle('active');
                mobileMenu.classList.toggle('active');
            });