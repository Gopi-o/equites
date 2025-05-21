document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('discount-modal');
    const closeBtn = document.querySelector('.discount-close');
    const openBtns = document.querySelectorAll('.discount-open');
    
    const modalTitle = document.getElementById('modal-discount-title');
    const modalDates = document.getElementById('modal-discount-dates');
    const modalDetails = document.getElementById('modal-discount-details');
    const modalCond = document.getElementById('modal-condition');
    const modalHow = document.getElementById('modal-how-to-use');

    function formatDate(dateString) {
        const options = { day: 'numeric', month: 'long', year: 'numeric' };
        return new Date(dateString).toLocaleDateString('ru-RU', options);
    }

    function loadDiscountData(discountId) {
        modalTitle.textContent = 'Загрузка...';
        modalDates.textContent = '';
        modalHow.textContent = '';
        modalCond.textContent = '';
        modalDetails.textContent = '';

        fetch(`/get_discount.php?id=${discountId}`)
            .then(response => {
                if (!response.ok) throw new Error('Ошибка сети');
                return response.json();
            })
            .then(data => {
                if (data.error) throw new Error(data.error);
                
                modalTitle.textContent = data.title;
                modalDates.textContent = `${formatDate(data.start_date)} - ${formatDate(data.end_date)}`;
                modalDetails.innerHTML = data.details?.replace(/\n/g, '<br>') || '';
                modalHow.innerHTML = data.how_to_use?.replace(/\n/g, '<br>') || '';
                modalCond.innerHTML = data.conditions?.replace(/\n/g, '<br>') || '';
            })
            .catch(error => {
                console.error('Error:', error);
                modalTitle.textContent = 'Ошибка загрузки';
                modalDetails.textContent = 'Пожалуйста, попробуйте позже.';
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