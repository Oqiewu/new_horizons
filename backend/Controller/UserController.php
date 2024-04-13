<?php

include_once __DIR__ . "/../Middleware/MiddlewareInterface.php";
include_once __DIR__ . "/../Service/UserService.php";


class UserController implements MiddlewareInterface
{
    public function getUserById($id) 
    {
        $user_service = new UserService();
        return json_encode($user_service->getUserById($id));
    }

    public function editUser($id, $full_name, $town, $region, $postal_code, $country) 
    {
        $user_service = new UserService();

        return json_encode($user_service->editUser($id, $full_name, $town, $region, $postal_code, $country));
    }
}