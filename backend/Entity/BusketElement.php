<?php

class BusketElement
{
     #Свойства объекта
     public $id;
     public $user_id;
     public $elements;

      #Сеттеры и геттеры
    public function setUser($user_id)
    {
        $this->user_id = $user_id;
    }
    public function getUser()
    {
        return $this->user_id;
    }

    public function setElements($elmenets)
    {
        $this->elmenets = $elmenets;
    }
    public function getElements()
    {
        return $this->elements;
    }
}