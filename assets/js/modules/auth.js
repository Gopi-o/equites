function showMessage(elementId, message, isSuccess) {
    const messageElement = document.getElementById(elementId);
    if (!messageElement) return;
    
    messageElement.textContent = message;
    messageElement.style.display = 'block';
    messageElement.className = isSuccess ? 'message success-message' : 'message error-message';
    
    if (isSuccess) {
        setTimeout(() => {
            messageElement.style.display = 'none';
        }, 5000);
    }
}

// Обработчик формы входа
document.getElementById('loginForm')?.addEventListener('submit', async e => {
    e.preventDefault();
    const formData = new FormData(e.target);
    
    try {
        const response = await fetch('/assets/vendor/auth/auth.php', {
            method: 'POST',
            body: formData
        });
        const data = await response.json();
        
        if (data.success) {
            showMessage('loginMessage', 'Успешный вход!', true);
            setTimeout(() => {
                closeAllModals();
                window.location.reload();
            }, 1000);
        } else {
            showMessage('loginMessage', data.message || 'Ошибка входа', false);
        }
    } catch (error) {
        showMessage('loginMessage', 'Ошибка сети. Попробуйте позже.', false);
    }
});

// Обработчик формы регистрации
document.getElementById('registerForm')?.addEventListener('submit', async e => {
    e.preventDefault();
    const formData = new FormData(e.target);
    
    try {
        const response = await fetch('/assets/vendor/auth/createUser.php', {
            method: 'POST',
            body: formData
        });
        const data = await response.json();
        
        if (data.success) {
            showMessage('registerMessage', 'Регистрация прошла успешно!', true);
            setTimeout(() => {
                closeAllModals();
                window.location.reload();
            }, 1000);
        } else {
            showMessage('registerMessage', data.message || 'Ошибка регистрации', false);
        }
    } catch (error) {
        showMessage('registerMessage', 'Ошибка сети. Попробуйте позже.', false);
    }
});

document.getElementById('forgotPasswordForm')?.addEventListener('submit', async e => {
    e.preventDefault();
    const formData = new FormData(e.target);
    
    try {
        const response = await fetch('/assets/vendor/auth/forgot_password.php', {
            method: 'POST',
            body: formData
        });
        const data = await response.json();
        
        showMessage('forgotPasswordMessage', data.message, true);
        
        // закрытие окна через 3 секунды 
        setTimeout(() => {
            closeAllModals();
        }, 3000);
        
    } catch (error) {
        showMessage('forgotPasswordMessage', 'Ошибка сети. Попробуйте позже.', false);
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const userIcon = document.getElementById('user-icon');
    const loginModal = document.getElementById('loginModal');

    const adminAccessBtn = document.getElementById('adminAccessBtn');
    const adminPinModal = document.getElementById('adminPinModal');
    const closeModal = document.querySelector('.close-modal');
    
    if (userIcon) {
        userIcon.addEventListener('click', function(e) {
            e.preventDefault();
            
            fetch('/assets/vendor/auth/checkAuth.php')
                .then(response => response.json())
                .then(data => {
                    if (data.isLoggedIn) {
                        window.location.href = '/pages/user-cabinet.php';
                    } else {
                        openModal('loginModal');
                    }
                })
                .catch(error => {
                    console.error('Ошибка проверки авторизации:', error);
                    openModal('loginModal');
                });
        });
    }

    if (adminAccessBtn) {
        adminAccessBtn.addEventListener('click', function() {
            adminPinModal.style.display = 'block';
        });
    }
    
    if (closeModal) {
        closeModal.addEventListener('click', function() {
            adminPinModal.style.display = 'none';
        });
    }
    
    // Закрытие модального окна при клике вне его
    window.addEventListener('click', function(event) {
        if (event.target === adminPinModal) {
            adminPinModal.style.display = 'none';
        }
    });

    //Check PinCode for admin
    const pinForm = document.getElementById('adminPinForm');
    if (pinForm) {
        pinForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const pinInput = document.getElementById('adminPin');
            if (pinInput) {
                const pin = pinInput.value;
                
                fetch('/assets/vendor/auth/verify_admin_pin.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `pin=${pin}`
                })
                .then(response => response.json())
                .then(data => {
                    const pinMessage = document.getElementById('pinMessage');
                    if (data.success) {
                        window.location.href = '/pages/admin/dashboard.php';
                    } else if (pinMessage) {
                        pinMessage.textContent = data.message;
                        pinMessage.style.color = 'red';
                    }
                });
            }
        });
    }
});