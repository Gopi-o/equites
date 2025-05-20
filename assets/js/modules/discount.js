document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('discount-modal');
    const closeBtn = document.querySelector('.discount-close');
    const openBtns = document.querySelectorAll('.discount-open');
    
    const modalTitle = document.getElementById('modal-discount-title');
    const modalDates = document.getElementById('modal-discount-dates');
    const modalDesc = document.getElementById('modal-discount-description');

    function formatDate(dateString) {
        const options = { day: 'numeric', month: 'long', year: 'numeric' };
        return new Date(dateString).toLocaleDateString('ru-RU', options);
    }

    function loadDiscountData(discountId) {
        modalTitle.textContent = 'Загрузка...';
        modalDates.textContent = '';
        modalDesc.textContent = '';

        fetch(`/get_discount.php?id=${discountId}`)
            .then(response => {
                if (!response.ok) throw new Error('Ошибка сети');
                return response.json();
            })
            .then(data => {
                if (data.error) throw new Error(data.error);
                
                // Форматируем данные для отображения
                modalTitle.textContent = data.title;
                modalDates.textContent = `${formatDate(data.start_date)} - ${formatDate(data.end_date)}`;
                
                // Сохраняем переносы строк в описании
                modalDesc.innerHTML = data.description
                    .replace(/\n/g, '<br>')
                    .replace(/\*(.*?)\*/g, '<strong>$1</strong>'); // Форматирование *жирный текст*
            })
            .catch(error => {
                console.error('Error:', error);
                modalTitle.textContent = 'Ошибка загрузки';
                modalDesc.textContent = 'Пожалуйста, попробуйте позже.';
            });
    }

    function openModal(discountId) {
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
        loadDiscountData(discountId);
    }

    function closeModal() {
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
    }

    openBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            openModal(this.dataset.id);
        });
    });

    closeBtn.addEventListener('click', closeModal);
    modal.addEventListener('click', function(e) {
        if (e.target === modal) closeModal();
    });
});