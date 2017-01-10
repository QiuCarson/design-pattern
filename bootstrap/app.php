<?php
namespace Bootstrap;

class App {
    public $base_dir;
    public $config;
    protected static $instance;

    protected function __construct($base_dir){
        $this->base_dir = $base_dir;
        $this->config = new Config($base_dir.'/config');        
    }
    //单列模式
    static function getInstance($base_dir = '')
    {
        if (empty(self::$instance))
        {
            self::$instance = new self($base_dir);
        }
        return self::$instance;
    }

    //
    public function run(){

        $uri = $_SERVER['REQUEST_URI'];


        list($c,$v) = explode('/', trim($uri, '/'));
        
        $c_low = strtolower($c);
        $c = ucwords($c);

        $class = '\\App\\Controllers\\'.$c;
        $obj = new $class($c, $v);


        $controller_config = $this->config['controller'];
        $decorators = array();
        if (isset($controller_config[$c_low]['decorator'])){
            $conf_decorator = $controller_config[$c_low]['decorator'];
            foreach($conf_decorator as $class)
            {
                $decorators[] = new $class;
            }
        }

        //装饰器模式
        foreach($decorators as $decorator)
        {
            $decorator->beforeRequest($obj);
        }
        $return_value = $obj->$v();
        foreach($decorators as $decorator)
        {
            $decorator->afterRequest($return_value);
        }
    }
}