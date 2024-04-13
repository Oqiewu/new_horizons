<?php

class User {
    #Свойства объекта
    public $id;
    public $full_name;
    public $login;
    public $email;
    public $password;
    public $town; 
    public $region;
    public $postal_code;
    public $country;
    
    #Сеттеры и геттеры
    public function setFullName($full_name)
    {
        $this->full_name = $full_name;
    }
    public function getFullName()
    {
        return $this->full_name;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }
    public function getLogin()
    {
        return $this->login;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function getPassword()
    {
        return $this->password;
    }

    public function setTown($town)
    {
        $this->town = $town;
    }
    public function getTown()
    {
        return $this->town;
    }

    public function setRegion($region)
    {
        $this->region = $region;
    }
    public function getRegion()
    {
        return $this->region;
    }

    public function setPostalCode($postal_code)
    {
        $this->postal_code = $postal_code;
    }
    public function getPostalCode()
    {
        return $this->postal_code;
    }

    public function setCountry($country)
    {
        $this->country = $country;
    }
    public function getCountry()
    {
        return $this->country;
    }
}