<?php
namespace Bootstrap;
class Autoload{
    static function autoload($class){
       // echo $class;
        include BASEDIR."/".str_replace("\\", "/", $class).".php";
    }
}