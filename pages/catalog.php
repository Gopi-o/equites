<?php include($_SERVER['DOCUMENT_ROOT'] . '/pages/template/main/header.php')?>

    <section class="catalog-banner dark-section">
        <div class="banner-content">
        </div>
        <div class="section-divider divider-bottom"></div>
    </section>

    <!-- Основное содержимое каталога -->
    <div class="container">
        <h2 class="catalog-title">Каталог услуг</h2>
        
        <!-- Фильтры (динамически из БД) -->
        <div class="filters-container">
            <div class="filter-box active" data-category="all">
                <span class="filter-title">Все товары</span>
                <span class="filter-clear"><i class="fas fa-times"></i></span>
            </div>
            
            <?php
            // Получаем уникальные категории из базы данных
            $categories = query("SELECT DISTINCT category FROM products WHERE category IS NOT NULL AND category != ''");
            
            foreach ($categories as $category): 
                if (!empty($category['category'])):
            ?>
                <div class="filter-box" data-category="<?= htmlspecialchars($category['category']) ?>">
                    <span class="filter-title"><?= htmlspecialchars($category['category']) ?></span>
                    <span class="filter-clear"><i class="fas fa-times"></i></span>
                </div>
            <?php
                endif;
            endforeach; 
            ?>
        </div>
        
        <!-- Карточки товаров -->
        <div id="catalog" class="products-grid">
            <?php
            $products = query("SELECT product_id, name, description, price, image_url, category FROM products");
            foreach ($products as $product): 
                $price = number_format($product['price'], 0, '', ' ');
            ?>
                <div class="promotion-card" data-product-id="<?= $product['product_id'] ?>" data-category="<?= htmlspecialchars($product['category']) ?>">
                    <div class="promotion-img" style="background-image: url('<?= $product['image_url'] ?>')"></div>
                    <div class="promotion-content">
                        <h3><?= htmlspecialchars($product['name']) ?></h3>
                        <p><?= htmlspecialchars($product['description']) ?></p>
                        <button class="price-btn add-to-cart" data-product-id="<?= $product['product_id'] ?>">
                            <?= $price ?> ₽
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Фильтрация по категориям
        const filterBoxes = document.querySelectorAll('.filter-box');
        filterBoxes.forEach(box => {
            box.addEventListener('click', function() {
                const category = this.dataset.category;
                
                // Обновляем активное состояние фильтров
                filterBoxes.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                
                // Показываем/скрываем товары в зависимости от выбранной категории
                const products = document.querySelectorAll('.promotion-card');
                products.forEach(product => {
                    if (category === 'all' || product.dataset.category === category) {
                        product.style.display = 'block';
                    } else {
                        product.style.display = 'none';
                    }
                });
            });
        });
        
        // Обработка кнопок "Добавить в корзину"
        const addToCartButtons = document.querySelectorAll('.add-to-cart');
        addToCartButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const productId = this.dataset.productId;
                const productCard = this.closest('.promotion-card');
                
                // Визуальный эффект при добавлении
                this.classList.add('added');
                this.innerHTML = '<i class="fas fa-check"></i> Добавлено';
                
                // Здесь будет AJAX-запрос для добавления в корзину
                fetch('/assets/vendor/cart/add-to-cart.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        product_id: productId,
                        quantity: 1
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Обновляем счетчик корзины в шапке, если есть
                        const cartCounter = document.querySelector('.cart-counter');
                        if (cartCounter) {
                            cartCounter.textContent = data.cart_total || '';
                            cartCounter.style.display = 'inline-block';
                        }
                    } else {
                        alert('Ошибка: ' + (data.message || 'Не удалось добавить товар'));
                        this.innerHTML = '<?= $price ?> ₽';
                        this.classList.remove('added');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Произошла ошибка при добавлении в корзину');
                    this.innerHTML = '<?= $price ?> ₽';
                    this.classList.remove('added');
                });
                
                // Возвращаем исходное состояние через 2 секунды
                setTimeout(() => {
                    if (!this.classList.contains('added')) return;
                    this.classList.remove('added');
                    this.innerHTML = '<?= $price ?> ₽';
                }, 2000);
            });
        });
    });
    </script>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/pages/template/main/footer.php')?>