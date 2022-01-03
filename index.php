<?php

    require 'Routing.php';

    $path = trim($_SERVER['REQUEST_URI'], '/');
    $path = parse_url($path, PHP_URL_PATH);

    Routing::get('index', 'DefaultController');
    Routing::get('main_page', 'DefaultController');
    Routing::get('walk_page', 'DefaultController');
    Routing::get('meetings_page', 'DefaultController');
    Routing::run($path);
