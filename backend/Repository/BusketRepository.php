<?php
include_once __DIR__ . "/../Config/database.php";


class BusketRepository
{
    public function addBusket($user_id, $elements) 
    {
        $database = new Database();
        $db = $database->getConnection();
        
        $data = json_encode($elements);

        $sql = "INSERT INTO `busket`
        (
        `user_id`,
        `element`
        )
        VALUES
        (
        '$user_id',
        '$data'
        )";

        if(mysqli_query($db, $sql))
        {
            return true;
        } else {
            return "Ошибка addBusket:" . mysqli_error($db);
        };
    }

    public function editBusket($user_id, $elements)
    {
        $database = new Database();
        $db = $database->getConnection();
        $data = json_encode($elements);

        $sql = "UPDATE busket SET 
        `element`='$data'
        WHERE `user_id` = $user_id";

        if(mysqli_query($db, $sql)) 
        {
            return true;
        } else {
            return "Ошибка editBusket:" . mysqli_error($db);
        };

    }

    public function getBusket($user_id)
    {
        $database = new Database();
        $db = $database->getConnection();

        $sql = "SELECT * FROM `busket` WHERE `user_id` = '$user_id'";
        $data = mysqli_query($db, $sql);
        
        if($data) {
            $row = mysqli_fetch_assoc($data);
            return $row;
        } else {
            return "Ошибка getBusket:" . mysqli_error($db);
        }
    }
}