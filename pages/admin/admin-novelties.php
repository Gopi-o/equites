<?php 
session_start();
include($_SERVER['DOCUMENT_ROOT'] . '/pages/template/main/header.php');

redirectIfNotLoggedIn();
redirectIfNotAdmin();

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
        
        <form method="POST" action="/assets/vendor/admin/add-novelty.php" class="compact-form">
            <div class="form-row">
                <input type="text" name="title" placeholder="Заголовок" required>
                <textarea name="description" placeholder="Описание" rows="1"></textarea>
                <button type="submit" class="compact-btn">+ Добавить</button>
            </div>
        </form>
        
        <table class="users-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Заголовок</th>
                    <th>Дата</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($novelties as $novelty) { ?>
                    <tr>
                        <td><?= $novelty['id'] ?></td>
                        <td><?= htmlspecialchars($novelty['title']) ?></td>
                        <td><?= date('d.m.Y', strtotime($novelty['date'])) ?></td>
                        <td>
                            <form method="POST" action="/assets/vendor/admin/delete-novelty.php" onsubmit="return confirm('Удалить?')">
                                <input type="hidden" name="id" value="<?= $novelty['id'] ?>">
                                <button type="submit" class="action-btn delete-btn">Удалить</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</main>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/pages/template/main/footer.php'); ?>