<?php
session_start();
include($_SERVER['DOCUMENT_ROOT'] . '/pages/template/main/header.php');


$userId = $_SESSION['id_user'] ?? null;

// Обработка формы
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $horseId = $_POST['horse_id'] ?? null;
    $trainerId = $_POST['trainer_id'] ?? null;
    $bookingDate = $_POST['booking_date'] ?? '';
    
    if (empty($horseId) || empty($bookingDate)) {
        $error = 'Заполните обязательные поля';
    } else {
        if (createBooking($userId, $horseId, $trainerId, $bookingDate)) {
            $_SESSION['success'] = 'Бронирование создано!';
            echo '<script>window.location.href = "/pages/user-cabinet.php";</script>';
            exit;
        } else {
            $error = 'Ошибка при бронировании';
        }
    }
}

// Получение списка лошадей и тренеров
$horses = query("SELECT * FROM horses WHERE status = 'active'");
$trainers = query("SELECT * FROM trainers WHERE is_active = 1");
?>



<section class="transition-diagonal gold-section">
    <div class="section-divider diagonal-divider divider-top"></div>
    <div class="section-divider divider-bottom"></div>
</section>

<main>
    <div class="wrapper">
        <div class="container">
            <h1>Бронирование занятия</h1>
            
            <?php if (!empty($error)): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
            
            <form method="POST" class="booking-form">
                <div class="form-group">
                    <label for="horse_id">Выберите лошадь</label>
                    <select name="horse_id" id="horse_id" class="form-control" required>
                        <option value="">-- Выберите лошадь --</option>
                        <?php foreach ($horses as $horse): ?>
                            <option value="<?= $horse['horse_id'] ?>">
                                <?= htmlspecialchars($horse['name']) ?> (<?= htmlspecialchars($horse['breed'] ?? '') ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="trainer_id">Выберите тренера (необязательно)</label>
                    <select name="trainer_id" id="trainer_id" class="form-control">
                        <option value="">-- Без тренера --</option>
                        <?php foreach ($trainers as $trainer): ?>
                            <option value="<?= $trainer['trainer_id'] ?>">
                                <?= htmlspecialchars($trainer['name']) ?> (<?= htmlspecialchars($trainer['qualification'] ?? '') ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="booking_date">Дата и время</label>
                    <input type="datetime-local" name="booking_date" id="booking_date" class="form-control" required>
                    <small class="text-muted">Занятия длятся 60 минут</small>
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn">Забронировать</button>
                    <a href="/pages/user-cabinet.php" class="btn btn-outline">Отмена</a>
                </div>
            </form>
        </div>
    </div>
</main>

<script>
// Установка минимальной даты (текущий день)
document.addEventListener('DOMContentLoaded', function() {
    const now = new Date();
    const minDate = new Date(now.getTime() + 24 * 60 * 60 * 1000); 
    
    const year = minDate.getFullYear();
    const month = String(minDate.getMonth() + 1).padStart(2, '0');
    const day = String(minDate.getDate()).padStart(2, '0');
    const hours = String(minDate.getHours()).padStart(2, '0');
    const minutes = String(minDate.getMinutes()).padStart(2, '0');
    
    const minDateTime = `${year}-${month}-${day}T${hours}:${minutes}`;
    document.getElementById('booking_date').min = minDateTime;
    
    const nextHour = new Date(now);
    nextHour.setHours(nextHour.getHours() + 1, 0, 0, 0);
    const nextHourStr = nextHour.toISOString().slice(0, 16);
    document.getElementById('booking_date').value = nextHourStr;
});
</script>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/pages/template/main/footer.php'); ?>