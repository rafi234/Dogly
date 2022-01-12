<?php

    require 'Routing.php';

    $path = trim($_SERVER['REQUEST_URI'], '/');
    $path = parse_url($path, PHP_URL_PATH);

    Routing::get('', 'DefaultController');
    Routing::get('mainPage', 'DefaultController');
    Routing::get('registration', 'DefaultController');

    Routing::get('walkPage', 'DefaultController');
    Routing::get('addWalk', 'DefaultController');

    Routing::get('meetings', 'DefaultController');
    Routing::get('addMeeting', 'DefaultController');


    Routing::post('addMeeting', 'MeetingsController');
    Routing::post('addWalk', 'WalkController');
    Routing::post('login', 'SecurityController');
    Routing::post('registration', 'RegistrationController');

    Routing::run($path);
