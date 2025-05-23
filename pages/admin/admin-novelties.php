<?php 
session_start();
include($_SERVER['DOCUMENT_ROOT'] . '/pages/template/main/header.php');

redirectIfNotLoggedIn();
redirectIfNotAdmin();

$editId = $_GET['edit'] ?? 0;
$editNovelty = null;
if ($editId) {
    $editNovelty = query("SELECT * FROM novelties WHERE id = ?", [$editId]);
    $editNovelty = $editNovelty[0] ?? null;
}

$novelties = getNovelties();
?>
    
<section class="transition-diagonal gold-section">
    <div class="section-divider diagonal-divider divider-top"></div>
    <div class="section-divider divider-bottom"></div>
</section>

<main>
    <div class="admin-container">
        <div class="admin-header">
            <h1 class="admin-title">Управление новинками</h1>
            <a href="/pages/admin/users.php" class="admin-back-btn">К пользователям</a>
        </div>
        
        <?php if (isset($_SESSION['admin_message'])) { ?>
            <div class="admin-message success"><?= $_SESSION['admin_message'] ?></div>
            <?php unset($_SESSION['admin_message']); ?>
        <?php } ?>
        
        <?php if (isset($_SESSION['admin_error'])) { ?>
            <div class="admin-message error"><?= $_SESSION['admin_error'] ?></div>
            <?php unset($_SESSION['admin_error']); ?>
        <?php } ?>
        
        <!-- Упрощенная форма без полей для ссылки -->
        <form method="POST" action="/assets/vendor/admin/<?= $editId ? 'update-novelty' : 'add-novelty' ?>.php" class="compact-form">
            <?php if ($editId): ?>
                <input type="hidden" name="id" value="<?= $editId ?>">
            <?php endif; ?>
            
            <div class="form-row">
                <input type="text" name="title" placeholder="Заголовок" 
                       value="<?= $editNovelty ? htmlspecialchars($editNovelty['title']) : '' ?>" required>
                <textarea name="description" placeholder="Описание" rows="1"><?= $editNovelty ? htmlspecialchars($editNovelty['description']) : '' ?></textarea>
                <button type="submit" class="compact-btn">
                    <?= $editId ? 'Обновить' : '+ Добавить' ?>
                </button>
                <?php if ($editId): ?>
                    <a href="/pages/admin/admin-novelties.php" class="compact-btn cancel-btn">Отмена</a>
                <?php endif; ?>
            </div>
            <!-- Фиксированные значения для ссылки -->
            <input type="hidden" name="link_text" value="Подробнее">
            <input type="hidden" name="link_url" value="#">
        </form>
        
        <table class="users-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Заголовок</th>
                    <th>Описание</th>
                    <th>Дата</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($novelties as $novelty) { ?>
                    <tr>
                        <td><?= $novelty['id'] ?></td>
                        <td><?= htmlspecialchars($novelty['title']) ?></td>
                        <td><?= htmlspecialchars(mb_substr($novelty['description'], 0, 50)) . (mb_strlen($novelty['description']) > 50 ? '...' : '') ?></td>
                        <td><?= date('d.m.Y', strtotime($novelty['date'])) ?></td>
                        <td>
                            <div class="action-buttons">
                                <a href="/pages/admin/admin-novelties.php?edit=<?= $novelty['id'] ?>" class="action-btn change-btn">Изменить</a>
                                <form method="POST" action="/assets/vendor/admin/delete-novelty.php" onsubmit="return confirm('Удалить?')">
                                    <input type="hidden" name="id" value="<?= $novelty['id'] ?>">
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