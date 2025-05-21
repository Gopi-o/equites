<?php 
session_start();
include($_SERVER['DOCUMENT_ROOT'] . '/pages/template/main/header.php');

// Проверка прав администратора
redirectIfNotLoggedIn();
redirectIfNotAdmin();

// Получение списка пользователей
$users = query("SELECT * FROM users ORDER BY registration_date DESC");

?>

    
    <section class="transition-diagonal gold-section">
        <div class="section-divider diagonal-divider divider-top"></div>
        <div class="section-divider divider-bottom"></div>
    </section>

    <main>
        <div class="admin-container">
            <div class="admin-header">
                <h1 class="admin-title">Управление пользователями</h1>
                <a href="/pages/user-cabinet.php" class="admin-back-btn">Вернуться в кабинет</a>
            </div>
            
            <?php if (isset($_SESSION['admin_message'])) { ?>
                <div class="admin-message success"><?= $_SESSION['admin_message'] ?></div>
                <?php unset($_SESSION['admin_message']); ?>
            <?php } ?>
            
            <?php if (isset($_SESSION['admin_error'])) { ?>
                <div class="admin-message error"><?= $_SESSION['admin_error'] ?></div>
                <?php unset($_SESSION['admin_error']); ?>
            <?php } ?>
            
            <table class="users-table">
                <thead>
                    <tr>
                        <th>Пользователь</th>
                        <th>Email</th>
                        <th>Телефон</th>
                        <th>Дата регистрации</th>
                        <th>Роль</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) { ?>
                        <tr>
                            <td>
                                <div class="user-info">
                                    <div class="user-avatar">
                                        <?= mb_substr($user['name'] ?? '', 0, 1) ?>
                                        <?= mb_substr($user['last_name'] ?? '', 0, 1) ?>
                                    </div>
                                    <div>
                                        <?= htmlspecialchars($user['name'] ?? '') ?> 
                                        <?= htmlspecialchars($user['last_name'] ?? '') ?>
                                    </div>
                                </div>
                            </td>
                            <td><?= htmlspecialchars($user['email'] ?? '') ?></td>
                            <td><?= htmlspecialchars($user['phone'] ?? 'Не указан') ?></td>
                            <td><?= date('d.m.Y', strtotime($user['registration_date'])) ?></td>
                            <td>
                                <form method="POST" action="/assets/vendor/admin/change-role.php" class="role-form">
                                    <input type="hidden" name="user_id" value="<?= $user['user_id'] ?>">
                                    <select name="new_role" class="role-select">
                                        <option value="user" <?= ($user['role'] ?? '') === 'user' ? 'selected' : '' ?>>Пользователь</option>
                                        <option value="admin" <?= ($user['role'] ?? '') === 'admin' ? 'selected' : '' ?>>Администратор</option>
                                    </select>
                                    <button type="submit" class="action-btn change-btn">Изменить</button>
                                </form>
                            </td>
                            <td>
                                <?php if ($user['user_id'] != $_SESSION['id_user']) { ?>
                                    <form method="POST" action="/assets/vendor/admin/delete-user.php" onsubmit="return confirm('Вы уверены, что хотите удалить этого пользователя?');" class="delete-form">
                                        <input type="hidden" name="user_id" value="<?= $user['user_id'] ?>">
                                        <button type="submit" class="action-btn delete-btn">Удалить</button>
                                    </form>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>
    
<?php include($_SERVER['DOCUMENT_ROOT'] . '/pages/template/main/footer.php'); ?>