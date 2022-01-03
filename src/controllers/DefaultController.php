<?php

    require_once 'AppController.php';

    class DefaultController extends AppController {

        public function index()
        {
            $this->render('login');
        }

        public function main_page()
        {
            $this->render('main-page');
        }

        public function walk_page(){
            $this->render('walk-page');
        }

        public function meetings_page(){
            $this->render('meetings-page');
        }
    }