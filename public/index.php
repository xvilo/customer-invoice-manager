<?php

// Autoloading all composer packages
require_once __DIR__.'/../vendor/autoload.php';

// Autoloading all customer classes
require_once __DIR__.'/../private/autoload.php';

// Get basic settings
require_once __DIR__.'/../settings.php';

$app = new Cim($settings);

$app->run();