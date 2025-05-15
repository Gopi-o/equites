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

                // Валидация
                if (!validateForm(formData)) {
                    return;
                }

                // Отправка на сервер
                const response = await fetch('../add_review.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(formData)
                });

                const result = await response.json();

                if (result.success) {
                    showAlert('Спасибо! Ваш отзыв отправлен на модерацию.', 'success');
                    reviewForm.reset();
                    closeModal();
                    
                    // Если нужно обновить список отзывов без перезагрузки страницы:
                    // updateReviewsList();
                } else {
                    showAlert(result.message || 'Произошла ошибка при отправке отзыва', 'error');
                }
            } catch (error) {
                showAlert('Ошибка соединения с сервером', 'error');
                console.error('Ошибка:', error);
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

    // Функция показа уведомлений
    function showAlert(message, type) {
        const alert = document.createElement('div');
        alert.className = `alert ${type}`;
        alert.textContent = message;
        document.body.appendChild(alert);
        
        setTimeout(() => {
            alert.classList.add('fade-out');
            setTimeout(() => alert.remove(), 500);
        }, 3000);
    }
});