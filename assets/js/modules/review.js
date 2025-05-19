document.addEventListener('DOMContentLoaded', function() {
    const reviewBtn = document.getElementById('add-review');
    const reviewModal = document.getElementById('review-modal');
    const reviewClose = document.querySelector('.review-close');
    const reviewForm = document.getElementById('review-form');
    
    // Открытие модального окна
    reviewBtn.addEventListener('click', function(e) {
        e.preventDefault();
        reviewModal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    });
    
    // Закрытие модального окна
    function closeModal() {
        reviewModal.style.display = 'none';
        document.body.style.overflow = 'auto';
    }
    
    reviewClose.addEventListener('click', closeModal);
    
    // Закрытие при клике на overlay
    reviewModal.addEventListener('click', function(e) {
        if (e.target === reviewModal) {
            closeModal();
        }
    });

    // Обработка отправки формы
    if (reviewForm) {
        reviewForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalBtnText = submitBtn.textContent;
            submitBtn.disabled = true;
            submitBtn.textContent = 'Отправка...';
            
            try {
                // Собираем данные формы
                const formData = {
                    email: document.getElementById('review-email').value.trim(),
                    phone: document.getElementById('review-phone').value.trim(),
                    user_name: document.getElementById('review-name').value.trim(),
                    comment: document.getElementById('review-comment').value.trim(),
                    rating: document.getElementById('review-rating').value
                };

                console.log('Отправляемые данные:', formData); // Логирование

                // Валидация
                if (!validateForm(formData)) {
                    return;
                }

                // Отправка на сервер
                const response = await fetch('/assets/vendor/reviews/add_review.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(formData)
                });

                console.log('Статус ответа:', response.status); // Логирование

                if (!response.ok) {
                    const errorData = await response.json().catch(() => null);
                    throw new Error(errorData?.message || 'Ошибка сервера');
                }

                const result = await response.json();
                console.log('Результат:', result); // Логирование

                if (result.success) {
                    showAlert('Спасибо! Ваш отзыв отправлен на модерацию.', 'success');
                    reviewForm.reset();
                    closeModal();
                } else {
                    throw new Error(result.message || 'Ошибка при отправке');
                }
            } catch (error) {
                console.error('Ошибка:', error);
                showAlert(error.message || 'Ошибка соединения с сервером', 'error');
            } finally {
                submitBtn.disabled = false;
                submitBtn.textContent = originalBtnText;
            }
        });
    }

    // Функция валидации формы
    function validateForm(data) {
        if (!data.user_name || !data.comment || !data.rating || !data.email) {
            showAlert('Пожалуйста, заполните все обязательные поля', 'error');
            return false;
        }

        if (!/^\S+@\S+\.\S+$/.test(data.email)) {
            showAlert('Пожалуйста, введите корректный email', 'error');
            return false;
        }

        if (data.rating < 1 || data.rating > 5) {
            showAlert('Пожалуйста, выберите оценку от 1 до 5', 'error');
            return false;
        }

        return true;
    }

    // Улучшенная функция показа уведомлений
   function showAlert(message, type) {
    // Создаем элемент уведомления
    const alert = document.createElement('div');
    alert.className = `alert ${type}`;
    alert.textContent = message;
    
    // Добавляем на страницу
    document.body.appendChild(alert);
    
    // Запускаем анимацию появления
    setTimeout(() => {
        alert.classList.add('show');
    }, 10);
    
    // Удаление через 3 секунды с анимацией
    setTimeout(() => {
        alert.classList.remove('show');
        
        // Полное удаление после анимации
        setTimeout(() => {
            alert.remove();
        }, 300);
    }, 3000);
}
});