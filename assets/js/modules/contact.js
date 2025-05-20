document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contact-form');
    
    if (contactForm) {
        contactForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const submitBtn = this.querySelector('input[type="submit"]');
            const originalBtnValue = submitBtn.value;
            submitBtn.disabled = true;
            submitBtn.value = 'Отправка...';
            
            try {
                // Собираем данные формы
                const formData = {
                    name: document.getElementById('contact-name').value.trim(),
                    email: document.getElementById('contact-email').value.trim(),
                    comment: document.getElementById('contact-comment').value.trim()
                };

                console.log('Отправляемые данные:', formData);

                // Валидация
                if (!formData.name || !formData.comment || !formData.email) {
                    showAlert('Заполните все обязательные поля', 'error');
                    return;
                }

                if (!/^\S+@\S+\.\S+$/.test(formData.email)) {
                    showAlert('Введите корректный email', 'error');
                    return;
                }

                // Отправка на сервер
                const response = await fetch('/assets/vendor/contact/add_contact.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(formData)
                });

                console.log('Статус ответа:', response.status);

                if (!response.ok) {
                    const errorData = await response.json().catch(() => null);
                    throw new Error(errorData?.message || 'Ошибка сервера');
                }

                const result = await response.json();
                console.log('Результат:', result);

                if (result.success) {
                    showAlert('Спасибо! Ваше сообщение отправлено.', 'success');
                    contactForm.reset();
                } else {
                    throw new Error(result.message || 'Ошибка при отправке');
                }
            } catch (error) {
                console.error('Ошибка:', error);
                showAlert(error.message, 'error');
            } finally {
                submitBtn.disabled = false;
                submitBtn.value = originalBtnValue;
            }
        });
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