<?php
namespace App\Model;

class Order extends \Bootstrap\Model {
    public function create($order){        
        $this->notify($order);
    }
}