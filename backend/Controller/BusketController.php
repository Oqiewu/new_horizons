<?php

include_once __DIR__ . "/../Service/BusketService.php";
include_once __DIR__ . "/../Middleware/MiddlewareInterface.php";

class BusketController implements MiddlewareInterface
{
    public function editBusket($user_id, $elements) 
    {
        $busketElementService = new BusketService();

        $busket = $busketElementService->getBusket($user_id);

        if($busket) 
        {
            return json_encode($busketElementService->editBusket($user_id, $elements));
        } else {
            return json_encode($busketElementService->addBusket($user_id, $elements));
        }
    }

    public function getBusket($user_id) 
    {
        $busketElementService = new BusketService();

        return json_encode($busketElementService->getBusket($user_id));
    }
}