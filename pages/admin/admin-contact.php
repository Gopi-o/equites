<?php 
session_start();
include($_SERVER['DOCUMENT_ROOT'] . '/pages/template/main/header.php');

redirectIfNotLoggedIn();
redirectIfNotAdmin();

$contacts = getContacts();
?>
    
<section class="transition-diagonal gold-section">
    <div class="section-divider diagonal-divider divider-top"></div>
    <div class="section-divider divider-bottom"></div>
</section>

<main>
    <div class="admin-container">
        <div class="admin-header">
            <h1 class="admin-title">Управление контактами</h1>
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
        
        <form method="POST" action="/assets/vendor/admin/add-contact.php" class="compact-form">
            <div class="form-row">
                <input type="text" name="name" placeholder="Имя" required>
                <textarea name="information" placeholder="Информация" rows="1"></textarea>
                <button type="submit" class="compact-btn">+ Добавить</button>
            </div>
        </form>
        
        <table class="users-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Информация</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contacts as $contact) { ?>
                    <tr>
                        <td><?= $contact['id'] ?></td>
                        <td><?= htmlspecialchars($contact['name']) ?></td>
                        <td><?= htmlspecialchars($contact['information']) ?></td>
                        <td>
                            <form method="POST" action="/assets/vendor/admin/delete-contact.php" onsubmit="return confirm('Удалить?')">
                                <input type="hidden" name="id" value="<?= $contact['id'] ?>">
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