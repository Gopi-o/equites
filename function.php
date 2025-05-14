<?php
    //Подключение к бд
    function connect(){
        $driver = 'mysql';
        $host = 'equites';
        $db_name = 'equites';
        $db_user = 'root';
        $db_password = '';
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


    function getMenuItems() {
        $isAdminArea = strpos($_SERVER['REQUEST_URI'], '/admin/') === 0;

        if ($isAdminArea && isset($_SESSION['is_admin'])) {
            $sql = "SELECT url, title FROM menu WHERE access_level = 'admin'";
        } else {
            $sql = "SELECT url, title FROM menu WHERE access_level = 'all'";
        }

        return query($sql);
    }
?>