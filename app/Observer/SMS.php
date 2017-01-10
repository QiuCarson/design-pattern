<?php
namespace App\Observer;
class SMS {
    public function process($data){
        echo "发短信";
    }
}