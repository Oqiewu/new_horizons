<?php
include_once __DIR__ . "/../Config/database.php";

class RegistrationRepository {
    public function auth($login, $password) {
        $database = new Database();
        $db = $database->getConnection();

        $sql = "SELECT * FROM user WHERE login = '$login'";

        $data = mysqli_query($db, $sql);

        if ($data) {
            $row = mysqli_fetch_assoc($data);
            return $row;
        } else {
            return "Ошибка:" . mysqli_error($db);
        }
    }

    public function registration(User $user) {
        $database = new Database();
        $db = $database->getConnection();

        $full_name = $user->getFullName();
        $login = $user->getLogin();
        $email = $user->getEmail();
        $password = $user->getPassword();
        $town = $user->getTown();
        $region = $user->getRegion();
        $postal_code = $user->getPostalCode();
        $country = $user->getCountry();

        #Проверка существует ли пользователь
        $data = mysqli_query($db, "SELECT * FROM user WHERE login = '$login' or email = '$email'");
        $data = mysqli_fetch_assoc($data);
        if ($data == NULL) {
            $sql = "INSERT INTO `user`(
                `full_name`, 
                `login`, 
                `email`, 
                `password`, 
                `town`, 
                `region`, 
                `postal_code`, 
                `country`) 
                VALUES (
                '$full_name',
                '$login',
                '$email',
                '$password',
                '$town',
                '$region',
                '$postal_code',
                '$country')"; 
        
            #Выполнение запроса на добавление пользователя        
            if (mysqli_query($db, $sql)) {
                #возвращение добавленного пользователя
                $data = mysqli_query($db, "SELECT * FROM user WHERE login = '$login'");
                $row = mysqli_fetch_assoc($data);
                return $row;
            } else {
                return "Ошибка:" . mysqli_error($db);
            }
        #Если пользователь уже зарегистрирован
        } else {
            return false;
        }
    }
}