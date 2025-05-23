<?php 
session_start();
include($_SERVER['DOCUMENT_ROOT'] . '/pages/template/main/header.php');

redirectIfNotLoggedIn();
redirectIfNotAdmin();

$contacts = getContacts();
$contact = !empty($contacts) ? $contacts[0] : null;

$contactFields = [
    'address' => 'Адрес',
    'phone' => 'Телефон',
    'email' => 'Email',
    'working_hours_weekdays' => 'Часы работы (будни)',
    'working_hours_weekends' => 'Часы работы (выходные)'
];
?>
    
<section class="transition-diagonal gold-section">
    <div class="section-divider diagonal-divider divider-top"></div>
    <div class="section-divider divider-bottom"></div>
</section>

<main>
    <div class="admin-container">
        <div class="admin-header">
            <h1 class="admin-title">Управление контактами</h1>
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
        
        <!-- Форма обновления контактов -->
        <form method="POST" action="/assets/vendor/admin/update-contact.php" class="compact-form" id="contactForm">
            <div class="form-row">
                <select name="field" class="select-form" id="fieldSelect" required
                        onchange="updateFieldValue(this.value)">
                    <option value="">Выберите поле для редактирования</option>
                    <?php foreach ($contactFields as $field => $label): ?>
                        <option value="<?= $field ?>" 
                                data-current="<?= htmlspecialchars($contact[$field] ?? '') ?>">
                            <?= $label ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <input type="text" name="value" id="valueInput" placeholder="Текущее значение появится здесь" required>
                <button type="submit" class="compact-btn">Обновить</button>
            </div>
        </form>
        
        <table class="users-table">
            <thead>
                <tr>
                    <th>Поле</th>
                    <th>Значение</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($contact): ?>
                    <?php foreach ($contactFields as $field => $label): ?>
                        <tr>
                            <td><?= $label ?></td>
                            <td><?= htmlspecialchars($contact[$field] ?? '—') ?></td>
                            <td>
                                <button onclick="fillForm('<?= $field ?>', '<?= htmlspecialchars($contact[$field] ?? '') ?>')" 
                                        class="action-btn change-btn">Изменить</button>
                                <form method="POST" action="/assets/vendor/admin/delete-contact.php" 
                                      onsubmit="return confirm('Очистить это поле?')" class="delete-form">
                                    <input type="hidden" name="field" value="<?= $field ?>">
                                    <button type="submit" class="action-btn delete-btn">Очистить</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3">Контактная информация не найдена</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>

<script>
function updateFieldValue(field) {
    const select = document.getElementById('fieldSelect');
    const option = select.querySelector(`option[value="${field}"]`);
    const valueInput = document.getElementById('valueInput');
    
    if (option && valueInput) {
        valueInput.value = option.dataset.current || '';
        valueInput.focus();
    }
}

function fillForm(field, value) {
    const select = document.getElementById('fieldSelect');
    const valueInput = document.getElementById('valueInput');
    
    if (select && valueInput) {
        select.value = field;
        valueInput.value = value;
        valueInput.focus();
    
    }
}
</script>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/pages/template/main/footer.php'); ?>