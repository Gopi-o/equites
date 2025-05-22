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
        
       <form method="POST" action="/assets/vendor/admin/update-contact.php" class="compact-form">
    <div class="form-row">
        <select class="select-form-update" name="field" required>
            <option value="">Выберите поле</option>
            <option value="address">Адрес</option>
            <option value="phone">Телефон</option>
            <option value="email">Email</option>
            <option value="working_hours_weekdays">Часы работы (будни)</option>
            <option value="working_hours_weekends">Часы работы (выходные)</option>
        </select>
        <input type="text" name="value" placeholder="Новое значение" required>
        <button type="submit" class="compact-btn">Обновить</button>
    </div>
</form>
        
        <table class="users-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                   
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
              
        <?php if (!empty($contacts)): 
            $contact = $contacts[0]; // Берем первую (и единственную) запись
        ?>
            <tr>
                <td>Адрес</td>
                <td><?= htmlspecialchars($contact['address']) ?></td>
                <td>
                    <a href="/assets/vendor/admin/edit-contact.php?field=address" class="action-btn delete-btn">Удалить</a>
                </td>
            </tr>
            <tr>
                <td>Телефон</td>
                <td><?= htmlspecialchars($contact['phone']) ?></td>
                <td>
                    <a href="/assets/vendor/admin/edit-contact.php?field=phone" class="action-btn delete-btn">Удалить</a>
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?= htmlspecialchars($contact['email']) ?></td>
                <td>
                    <a href="/assets/vendor/admin/edit-contact.php?field=email" class="action-btn delete-btn">Удалить</a>
                </td>
            </tr>
            <tr>
                <td>Часы работы (будни)</td>
                <td><?= htmlspecialchars($contact['working_hours_weekdays']) ?></td>
                <td>
                    <a href="/assets/vendor/admin/edit-contact.php?field=working_hours_weekdays" class="action-btn delete-btn">Удалить</a>
                </td>
            </tr>
            <tr>
                <td>Часы работы (выходные)</td>
                <td><?= htmlspecialchars($contact['working_hours_weekends']) ?></td>
                <td>
                    <a href="/assets/vendor/admin/edit-contact.php?field=working_hours_weekends" class="action-btn delete-btn">Удалить</a>
                </td>
            </tr>
        <?php else: ?>
            <tr>
                <td colspan="3">Контактная информация не найдена</td>
            </tr>
        <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/pages/template/main/footer.php'); ?>