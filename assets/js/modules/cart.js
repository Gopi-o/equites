document.addEventListener('DOMContentLoaded', function() {
    const cartIcon = document.getElementById('cart-icon');
    const cartModal = document.getElementById('cart-modal');
    const modalClose = document.querySelector('.modal-close');
    const continueShopping = document.getElementById('continue-shopping');
    const checkoutBtn = document.getElementById('checkout-btn');
    const cartItemsContainer = document.getElementById('cart-items-container');
    const cartTotalPrice = document.getElementById('cart-total-price');
    const emptyCartMessage = document.getElementById('empty-cart-message');
    
    // Открытие модального окна корзины с загрузкой данных
    cartIcon.addEventListener('click', function() {
        cartModal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
        loadCart();
    });
    
    // Закрытие модального окна
    function closeModal() {
        cartModal.style.display = 'none';
        document.body.style.overflow = 'auto';
    }
    
    modalClose.addEventListener('click', closeModal);
    continueShopping.addEventListener('click', closeModal);
    
    // Загрузка содержимого корзины
    async function loadCart() {
        try {
            const response = await fetch('/assets/vendor/cart/get-cart.php');
            const data = await response.json();
            
            if (!data.success) {
                throw new Error(data.message || 'Ошибка загрузки корзины');
            }
            
            // Обновляем интерфейс
            updateCartUI(data);
            
        } catch (error) {
            console.error('Cart error:', error);
            cartItemsContainer.innerHTML = '<div class="cart-error">Ошибка загрузки корзины</div>';
        }
    }
    
    // Обновление интерфейса корзины
    function updateCartUI(data) {
        if (data.items.length === 0) {
        emptyCartMessage.style.display = 'block';
        cartItemsContainer.style.display = 'none';
        cartTotalPrice.textContent = '0 ₽';
        checkoutBtn.disabled = true;
        return;
        }
        
        emptyCartMessage.style.display = 'none';
        cartItemsContainer.style.display = 'block';
        cartTotalPrice.textContent = data.total_formatted + ' ₽';
        checkoutBtn.disabled = false;
        
        // Очищаем контейнер
        cartItemsContainer.innerHTML = '';
        
        // Добавляем товары
        data.items.forEach(item => {
            const itemElement = document.createElement('div');
            itemElement.className = 'cart-item';
            
            
            itemElement.innerHTML = `
                <div class="cart-item-info">
                    <h4>${item.name}</h4>
                    <p>${item.total_formatted} ₽</p>
                </div>
                <div class="cart-item-actions">
                    <button class="cart-item-remove" data-product-id="${item.product_id}">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            `;
            cartItemsContainer.appendChild(itemElement);
        });
        
        // Назначаем обработчики для кнопок удаления
        document.querySelectorAll('.cart-item-remove').forEach(button => {
            button.addEventListener('click', async function() {
                const productId = this.dataset.productId;
                await removeFromCart(productId);
                loadCart(); // Перезагружаем корзину после удаления
            });
        });
    }
    
    // Удаление товара из корзины
    async function removeFromCart(productId) {
        try {
            const response = await fetch('/assets/vendor/cart/remove-from-cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    product_id: productId
                })
            });
            
            const data = await response.json();
            
            if (!data.success) {
                throw new Error(data.message || 'Ошибка удаления товара');
            }
            
            // Обновляем счетчик в шапке
            updateCartCounter(data.cart_total);
            
        } catch (error) {
            console.error('Remove error:', error);
            alert('Не удалось удалить товар из корзины');
        }
    }
    
    // Оформление заказа
    checkoutBtn.addEventListener('click', async function() {
        try {
            const response = await fetch('/assets/vendor/cart/checkout.php', {
                method: 'POST'
            });
            
            const data = await response.json();
            
            if (data.success) {
                window.location.href = `/index.php`;
            } else {
                throw new Error(data.message || 'Ошибка оформления заказа');
            }
            
        } catch (error) {
            console.error('Checkout error:', error);
            alert(error.message);
        }
    });
    
    // Функция обновления счетчика в шапке
    function updateCartCounter(count) {
        const counter = document.querySelector('.cart-count');
        if (counter) {
            counter.textContent = count;
            counter.style.display = count > 0 ? 'flex' : 'none';
        }
    }
    
    // Инициализация счетчика при загрузке
    fetch('/assets/vendor/cart/get-cart.php')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                updateCartCounter(data.cart_total);
            }
        });
});