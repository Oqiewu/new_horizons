<?php

include_once __DIR__ . "/../Repository/BusketRepository.php";

class BusketService
{
    public function addBusket($user_id, $elements)
    {
        $busketRepository = new BusketRepository();

        return $busketRepository->addBusket($user_id, $elements);
    }

    public function getBusket($user_id)
    {
        $busketRepository = new BusketRepository();

        return $busketRepository->getBusket($user_id);
    }

    public function editBusket($user_id, $elements)
    {
        $busketRepository = new BusketRepository();

        return $busketRepository->editBusket($user_id, $elements);
    }
}