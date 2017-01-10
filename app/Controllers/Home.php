<?php
namespace App\Controllers;

use App\Model\Order;
class Home{
    function test(){
        echo "test1";
    }
    public function index(){
        echo "index";
    }

    //观察者模式
    public function order(){
        $order = new Order;
        $arr=array(
            'orderno'=>"20170110121",
            'order_total'=>"20",
            );
        $order->create($arr);
        echo "index";
    }

    //代理模式，数据库主从
    public function index2(){
        
    }
}