<?php 
session_start();
include($_SERVER['DOCUMENT_ROOT'] . '/pages/template/main/header.php');

redirectIfNotLoggedIn();
redirectIfNotAdmin();

$editId = $_GET['edit'] ?? 0;
$editProduct = null;
if ($editId) {
    $editProduct = query("SELECT * FROM products WHERE product_id = ?", [$editId]);
    $editProduct = $editProduct[0] ?? null;
}

$products = query("SELECT product_id, name, price, category, description FROM products ORDER BY product_id DESC");
?>

<section class="transition-diagonal gold-section">
    <div class="section-divider diagonal-divider divider-top"></div>
    <div class="section-divider divider-bottom"></div>
</section>

<main>
    <div class="admin-container">
        <div class="admin-header">
            <h1 class="admin-title">Управление каталогом</h1>
            <a href="/pages/admin/admin-users.php" class="admin-back-btn">К пользователям</a>
        </div>
        
        <?php if (isset($_SESSION['admin_message'])) { ?>
            <div class="admin-message success"><?= $_SESSION['admin_message'] ?></div>
            <?php unset($_SESSION['admin_message']); ?>
        <?php } ?>
        
        <?php if (isset($_SESSION['admin_error'])) { ?>
            <div class="admin-message error"><?= $_SESSION['admin_error'] ?></div>
            <?php unset($_SESSION['admin_error']); ?>
        <?php } ?>
        
        <!-- Форма добавления/редактирования -->
        <form method="POST" action="/assets/vendor/admin/<?= $editId ? 'update-product' : 'add-product' ?>.php" class="compact-form">
            <?php if ($editId): ?>
                <input type="hidden" name="product_id" value="<?= $editId ?>">
            <?php endif; ?>
            
            <div class="form-row">
                <input type="text" name="name" placeholder="Название" 
                       value="<?= $editProduct ? htmlspecialchars($editProduct['name']) : '' ?>" required>
                <input type="number" name="price" placeholder="Цена" min="0" step="0.01" 
                       value="<?= $editProduct ? htmlspecialchars($editProduct['price']) : '' ?>" required>
                <input type="text" name="category" placeholder="Категория"
                       value="<?= $editProduct ? htmlspecialchars($editProduct['category']) : '' ?>">
                <button type="submit" class="compact-btn">
                    <?= $editId ? 'Обновить' : '+ Добавить' ?>
                </button>
                <?php if ($editId): ?>
                    <a href="/pages/admin/admin-catalog.php" class="compact-btn cancel-btn">Отмена</a>
                <?php endif; ?>
            </div>
            <div class="form-row">
                <textarea name="description" placeholder="Описание товара" rows="2"><?= $editProduct ? htmlspecialchars($editProduct['description']) : '' ?></textarea>
            </div>
        </form>
        
        <table class="users-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Категория</th>
                    <th>Описание</th>
                    <th>Цена</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product) { ?>
                    <tr>
                        <td><?= $product['product_id'] ?></td>
                        <td><?= htmlspecialchars($product['name']) ?></td>
                        <td><?= htmlspecialchars($product['category']) ?></td>
                        <td><?= htmlspecialchars(mb_substr($product['description'], 0, 50)) . (mb_strlen($product['description']) > 50 ? '...' : '') ?></td>
                        <td><?= number_format($product['price'], 0, '', ' ') ?> ₽</td>
                        <td>
                            <div class="action-buttons">
                                <a href="/pages/admin/admin-catalog.php?edit=<?= $product['product_id'] ?>" class="action-btn change-btn">Изменить</a>
                                <form method="POST" action="/assets/vendor/admin/delete-product.php" 
                                    onsubmit="return confirm('Удалить товар?')" class="delete-form">
                                    <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
                                    <button type="submit" class="action-btn delete-btn">Удалить</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</main>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/pages/template/main/footer.php'); ?>