<?php
define("BASEDIR", __DIR__);
include(BASEDIR."/bootstrap/autoload.php");
spl_autoload_register('Bootstrap\Autoload::autoload');

Bootstrap\App::getInstance(BASEDIR)->run();

