<?php

include_once __DIR__ . "/../Repository/UserRepository.php";

class UserService 
{
    public function getUserById($id) {
        $user_repository = new UserRepository();

        return $user_repository->getUserById($id);
    }

    public function editUser($id, $full_name, $town, $region, $postal_code, $country) {
        $user_repository = new UserRepository();

        if ($id && $full_name && $town && $region && $postal_code && $country) {
            return $user_repository->editUser($id, $full_name, $town, $region, $postal_code, $country);
        }
    }
}