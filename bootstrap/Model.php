<?php
namespace Bootstrap;

class Model
{
    protected $observers = array();

    function __construct()
    {
        $name = strtolower(str_replace('App\Model\\', '', get_class($this)));
       
        if (!empty(app::getInstance()->config['model'][$name]['observer']))
        {
            $observers = app::getInstance()->config['model'][$name]['observer'];

            foreach($observers as $class)
            {
                $this->observers[] = new $class;
            }
        }

    }

    function notify($event)
    {
        foreach($this->observers as $observer)
        {
            $observer->process($event);
        }
    }
}