<?php
include_once __DIR__ . "/../Repository/RegistrationRepository.php";
include_once __DIR__ . "/../Entity/User.php";

class RegistrationService {
    public function auth($login, $password) {
        $registrationRepository = new RegistrationRepository(); 

        $row = $registrationRepository->auth($login, $password);

        $token = 'allowed.' . $row['id'] . '.' . $row['login'];

        if ($row['password'] == md5($password))
        {
            return $token;
        }
    }

    public function registration($full_name, $login, $email, $password, $town, $region, $postal_code, $country) {
        $registrationRepository = new RegistrationRepository();

        $user = new User();

        if (
            !empty($full_name) &&
            !empty($login) &&
            !empty($email) &&
            !empty($password) &&
            !empty($town) &&
            !empty($region) &&
            !empty($postal_code) &&
            !empty($country)
        ) 
        {
            $user->setFullName($full_name);
            $user->setLogin($login);
            $user->setEmail($email);
            $user->setPassword(md5($password));
            $user->setTown($town);
            $user->setRegion($region);
            $user->setPostalCode($postal_code);
            $user->setCountry($country);
        } 

        $row = $registrationRepository->registration($user);

        if ($row != false)
        {
            $token = 'allowed.' . $row['id'] . '.' . $row['login'];
            return $token;
        } else {
            return $row;
        }
        
    }
}

