<?php

namespace App\Application;

class SubscribeSensor
{
    public $data;

    //supposed that data receiving via some subscription from sensors
    public function subscribe() {
        //...

        //this just sample
        $this->data = '[
            {"id":1, "face": "west", "temperature": 12, "timestamp":1670144689},
            {"id":2, "face": "north", "temperature": 10, "timestamp":1670144689},
            {"id":3, "face": "east", "temperature": 12, "timestamp":1670144689},
            {"id":4, "face": "south", "temperature": 16, "timestamp":1670144689},
            {"id":5, "face": "west", "temperature": 18, "timestamp":1670144689},
        ]';

        return $this->handleData(json_encode($this->data));
    }

    public function handleData($data) {
        return $data;
    }

}