<?php 

include_once __DIR__ . "/../Service/RegistrationService.php";

class RegistrationController
{
    public function auth($login, $password) {
        $registrationService = new RegistrationService();

        return json_encode($registrationService->auth($login, $password));
    }

    public function registration($full_name, $email, $login, $password, $town, $region, $postal_code, $country) {
        $registrationService = new RegistrationService();

        return json_encode($registrationService->registration(
            $full_name,
            $login,
            $email,
            $password,
            $town,
            $region,
            $postal_code,
            $country
        ));
    }
}