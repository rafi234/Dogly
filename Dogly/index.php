<?php

    require 'Routing.php';

    $path = trim($_SERVER['REQUEST_URI'], '/');
    $path = parse_url($path, PHP_URL_PATH);

    Routing::get('', 'DefaultController');
    Routing::get('mainPage', 'DefaultController');
    Routing::get('registration', 'RegistrationController');

    Routing::get('walkPage', 'WalkController');
    Routing::get('addWalk', 'WalkController');
    Routing::get('addTopPriorityWalks', 'WalkController');

    Routing::get('meetings', 'MeetingsController');
    Routing::get('addMeeting', 'MeetingsController');
    Routing::get('going', 'MeetingsController');
    Routing::get('interested', 'MeetingsController');

    Routing::post('addMeeting', 'MeetingsController');
    Routing::post('addWalk', 'WalkController');
    Routing::post('login', 'SecurityController');
    Routing::post('registration', 'RegistrationController');
    Routing::post('search', 'MeetingsController');

    Routing::run($path);
