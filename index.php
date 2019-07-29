<?php

include __DIR__ . '/vendor/autoload.php';

use System\Application;
use System\File;

$file = new File(__DIR__);

$app = Application::getInstance($file);

$app->run();