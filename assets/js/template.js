// Улучшенный скрипт для бургер-меню
    const burgerMenu = document.getElementById('burgerMenu');
    const mobileMenu = document.getElementById('mobileMenu');
    
    burgerMenu.addEventListener('click', function() {
        this.classList.toggle('active');
        mobileMenu.classList.toggle('active');
    });

// Скрипт для изменения фона хедера при скролле
    window.addEventListener('scroll', function() {
        const header = document.querySelector('header');
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });

// Функции для работы с модальными окнами
function openModal(modalId) {
    closeAllModals();
    document.getElementById(modalId).style.display = 'block';
    document.body.style.overflow = 'hidden';
}

function closeAllModals() {
    document.querySelectorAll('.modal').forEach(modal => {
        modal.style.display = 'none';
    });
    document.body.style.overflow = 'auto';
}

// Обработчики закрытия модальных окон
document.querySelectorAll('.close-modal').forEach(closeBtn => {
    closeBtn.addEventListener('click', closeAllModals);
});

window.addEventListener('click', e => {
    if (e.target.classList.contains('modal')) {
        closeAllModals();
    }
});

// Обработчики переключения между модальными окнами
document.getElementById('registerLink')?.addEventListener('click', e => {
    e.preventDefault();
    openModal('registerModal');
});

document.getElementById('forgotPasswordLink')?.addEventListener('click', e => {
    e.preventDefault();
    openModal('forgotPasswordModal');
});

document.getElementById('backToLoginLink')?.addEventListener('click', e => {
    e.preventDefault();
    openModal('loginModal');
});

document.getElementById('backToLoginFromRegisterLink')?.addEventListener('click', e => {
    e.preventDefault();
    openModal('loginModal');
});