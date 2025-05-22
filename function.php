<?php
    //Подключение к бд
    function connect(){
        $driver = 'mysql';
        $host = 'equites';
        $db_name = 'equites';
        $db_user = 'mysql';
        $db_password = 'mysql';
        $charset = 'utf8mb4';

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
            PDO::ATTR_EMULATE_PREPARES => false, 
        ];

        try{
            return new PDO("$driver:host=$host;dbname=$db_name;charset=$charset", $db_user, $db_password);
        }catch(PDOException $e){
            die('Нет подключения к базе данных, Ошибка - ' . $e->getMessage());
        }
    }

    function query($sql, $params = []){
        $sth = connect();
        $sth = $sth->prepare($sql);
        $sth->execute($params);
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        
        if(!$result) return [];
        return $result;
    }

    function make($sql, $params = []){
        $sth = connect();
        $sth = $sth->prepare($sql);
        return $sth->execute($params);
    }

    function validate($data) {
        $data = strip_tags($data);                  // Удаление HTML/PHP тегов
        $data = trim($data);                        // Удаление пробелов по краям
        $data = preg_replace('/\s+/', ' ', $data);  // Замена множества пробелов
        $data = htmlspecialchars($data);            // Экранирование спецсимволов
        return $data;
    }


    function isLoggedIn() {
        return isset($_SESSION['id_user']);
    }

    function isAdmin() {
        return isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true;
    }

    function redirectIfNotLoggedIn() {
        if (!isLoggedIn()) {
            if (!headers_sent()) {
                header('Location: /index.php');
                exit();
            } else {
                echo '<script>window.location.href = "/index.php";</script>';
                exit();
            }
        }
    }

    function redirectIfNotAdmin() {
        if (!isAdmin()) {
            header('Location: /');
            exit;
        }
    }

    function getMenuItems() {
        $isAdminArea = strpos($_SERVER['REQUEST_URI'], '/pages/admin/') === 0;

        if ($isAdminArea && isset($_SESSION['is_admin'])) {
            $sql = "SELECT url, title FROM menu WHERE access_level = 'admin'";
        } else {
            $sql = "SELECT url, title FROM menu WHERE access_level = 'all'";
        }

        return query($sql);
    }

    function getUserById($userId) {
        $sql = "SELECT * FROM users WHERE user_id = ?";
        $result = query($sql, [$userId]);
        return $result[0] ?? null;
    }

    function getUserByEmail($email) {
        $users = query("SELECT * FROM users WHERE email = ?", [$email]);
        return $users[0] ?? null;
    }


    function generateToken() {
        return bin2hex(random_bytes(32));
    }

    function createPasswordResetToken($userId) {
        $token = generateToken();
        $expires = date('Y-m-d H:i:s', strtotime('+1 hour'));
        
        make("INSERT INTO password_resets (user_id, token, expires_at) VALUES (?, ?, ?)", 
            [$userId, $token, $expires]);
        
        return $token;
    }

    function validatePasswordResetToken($token) {
        $result = query("SELECT * FROM password_resets WHERE token = ? AND expires_at > NOW()", [$token]);
        return $result[0] ?? null;
    }

    function deletePasswordResetToken($token) {
        return make("DELETE FROM password_resets WHERE token = ?", [$token]);
    }

    function updateUserPassword($userId, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        return make("UPDATE users SET password = ? WHERE user_id = ?", [$hashedPassword, $userId]);
    }
    function getUpcomingBookings($userId) {
        $sql = "SELECT b.*, h.name as horse_name, t.name as trainer_name
                FROM bookings b
                LEFT JOIN horses h ON b.horse_id = h.horse_id
                LEFT JOIN trainers t ON b.trainer_id = t.trainer_id
                WHERE b.user_id = ? 
                AND b.booking_date >= NOW() 
                AND b.status IN ('pending', 'confirmed')
                ORDER BY b.booking_date ASC";
        return query($sql, [$userId]);
    }

    function getPastBookings($userId) {
        $sql = "SELECT b.*, 
                    h.name as horse_name,
                    t.name as trainer_name
                FROM bookings b
                LEFT JOIN horses h ON b.horse_id = h.horse_id
                LEFT JOIN trainers t ON b.trainer_id = t.trainer_id
                WHERE b.user_id = ? 
                AND (b.booking_date < NOW() OR b.status IN ('completed', 'cancelled'))
                ORDER BY b.booking_date DESC";
        return query($sql, [$userId]);
    }

    function createBooking($userId, $horseId, $trainerId, $bookingDate) {
        $sql = "INSERT INTO bookings (user_id, horse_id, trainer_id, booking_date, status) 
                VALUES (?, ?, ?, ?, 'pending')";
        return make($sql, [$userId, $horseId, $trainerId, $bookingDate]);
    }

    function isTimeAvailable($horseId, $bookingDate, $trainerId = null, $excludeBookingId = null) {
        $sql = "SELECT COUNT(*) as count FROM bookings 
                WHERE booking_date = ? 
                AND (horse_id = ? OR (? IS NOT NULL AND trainer_id = ?))
                AND status IN ('pending', 'confirmed')";
        
        $params = [$bookingDate, $horseId, $trainerId, $trainerId];
        
        if ($excludeBookingId) {
            $sql .= " AND booking_id != ?";
            $params[] = $excludeBookingId;
        }
        
        $result = query($sql, $params);
        return $result[0]['count'] == 0;
    }

    function cancelBooking($bookingId, $userId) {
        $booking = query("SELECT 1 FROM bookings WHERE booking_id = ? AND user_id = ?", 
                        [$bookingId, $userId]);
        
        if (empty($booking)) {
            return false;
        }
        
        $sql = "UPDATE bookings SET status = 'cancelled' 
                WHERE booking_id = ? AND user_id = ? AND status IN ('pending', 'confirmed')";
        return make($sql, [$bookingId, $userId]);
    }

    function rescheduleBooking($bookingId, $userId, $newDate) {
        $booking = query("SELECT horse_id, trainer_id FROM bookings WHERE booking_id = ?", [$bookingId]);
        if (empty($booking)) return false;
        
        $horseId = $booking[0]['horse_id'];
        $trainerId = $booking[0]['trainer_id'];
        
        if (!isTimeAvailable($horseId, $newDate, $trainerId)) {
            return false;
        }
        
        $sql = "UPDATE bookings SET booking_date = ? 
                WHERE booking_id = ? AND user_id = ? AND status IN ('pending', 'confirmed')";
        return make($sql, [$newDate, $bookingId, $userId]);
    }

    function getBrands() {
        $sql = "SELECT id, name, country, logo, more FROM brands ORDER BY id ASC";
        return query($sql);
    }

    function getDiscounts() {
        $sql = "SELECT discount_id, title, description, start_date, end_date, image_url 
                FROM discount 
                ORDER BY start_date DESC";
        return query($sql);
    }

    function getNovelties() {
        $sql = "SELECT id, title, description, date, link_text, link_url 
                FROM novelties 
                ORDER BY date DESC";
        return query($sql);
    }
    function getContacts() {
        $sql = "SELECT *
                FROM contact_info
                ";
        return query($sql);
    }

    function getAllDiscount(){
        return query(
            "SELECT discount_id, title, description, start_date, end_date, image_url FROM discount"
        );

    }
     function getAllModalDiscount(){
        return query(
            "SELECT discount_id, title, description, details, `how_to_use`, `conditions`, start_date, end_date FROM discount WHERE discount_id = ?"
        );

    }

    function getAllReviews() {
        return query("
            SELECT user_name, rating, comment, created_at 
            FROM reviews 
            ORDER BY created_at DESC
        ");
    }


    function addReview($email, $phone, $user_name, $rating, $comment) {
        return make(
            "INSERT INTO reviews (email, phone, user_name, rating, comment, created_at, is_approved) 
            VALUES (?, ?, ?, ?, ?, CURDATE(), 0)",
            [$email, $phone, $user_name, $rating, $comment]
        );
    }

    function getProducts() {
        $sql = "SELECT product_id, name, description, price, image_url FROM products ORDER BY name ASC";
        return query($sql);
    }


    function addContact($email, $user_name, $comment) {
        return make(
            "INSERT INTO contact (email, user_name, comment, created_at) 
            VALUES (?, ?, ?, NOW())",
            [$email, $user_name, $comment]
        );
    }
    
    function calculateCartTotal($cart) {
        return array_reduce($cart, function($sum, $item) {
            return $sum + ($item['price'] * $item['quantity']);
        }, 0);
    }

    function countCartItems($cart) {
        return array_reduce($cart, function($sum, $item) {
            return $sum + $item['quantity'];
        }, 0);
    }
?>