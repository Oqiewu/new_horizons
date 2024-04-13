<?php

include_once __DIR__ . "/../Config/database.php";

class FeedbackRepository
{
    public function addFeedback($user_id, $description)
    {
        $database = new Database();
        $db = $database->getConnection();

        $sql = "INSERT INTO `feedback`
        (
        `user_id`,
        `description`
        )
        VALUES
        (
        '$user_id',
        '$description'
        )";

        if(mysqli_query($db, $sql))
        {
            return true;
        } else {
            return "Ошибка addFeedback:" . mysqli_error($db);
        };
    }

    public function getFeedback() 
    {
        $database = new Database();
        $db = $database->getConnection();
        
        $sql = "SELECT * FROM feedback";
        $data = mysqli_query($db, $sql);
        
        $rows = [];
        while ($row = mysqli_fetch_assoc($data)) {
            $user_id = $row['user_id'];
        
            $user_sql = "SELECT * FROM user WHERE id = $user_id";
            $user_data = mysqli_query($db, $user_sql);
            $user_row = mysqli_fetch_assoc($user_data);
        
            $row['user_id'] = $user_row;
        
            $rows[] = $row;
        }
        
        return $rows;
        
    }
}