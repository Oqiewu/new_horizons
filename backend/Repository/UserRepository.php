<?php
include_once __DIR__ . "/../Config/database.php";

class UserRepository 
{
    public function getUserById($id) {
        $database = new Database();
        $db = $database->getConnection();

        $sql = "SELECT * FROM user WHERE id = '$id'";

        $data = mysqli_query($db, $sql);

        if ($data) {
            $row = mysqli_fetch_assoc($data);
            return $row;
        } else {
            return "Ошибка:" . mysqli_error($db);
        }
    }

    public function editUser($id, $full_name, $town, $region, $postal_code, $country) {
        $database = new Database();
        $db = $database->getConnection();

        $sql = "UPDATE user SET 
        `full_name`='$full_name',
        `town`='$town',
        `region`='$region',
        `postal_code`='$postal_code',
        `country`='$country' 
        WHERE id = $id";

        if(mysqli_query($db, $sql)) {
            return true;
        } else {
            return "Ошибка:" . mysqli_error($db);
        };


        // !$full_name ?: $user['full_name'] = $full_name;
        // !$email ?: $user['email'] = $email;
        // !$login ?: $user['login'] = $login;
        // !$town ?: $user['town'] = $town;
        // !$region ?: $user['region'] = $region;
        // !$postal_code ?: $user['postal_code'] = $postal_code;
        // !$country ?: $user['country'] = $country;


    }
}