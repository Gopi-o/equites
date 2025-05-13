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