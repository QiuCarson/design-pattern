<?php
$config = array(
    'order' => array(
        'observer' => array(
            '\App\Observer\SMS',
            '\App\Observer\Mail'
        ),
    ),
);
return $config;