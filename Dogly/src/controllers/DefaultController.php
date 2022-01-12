<?php

    require_once 'AppController.php';

    class DefaultController extends AppController {

        public function index()
        {
            $this->render('login');
        }

        public function mainPage()
        {
            $this->render('mainPage');
        }

        public function walkPage(){
            $this->render('walkPage');
        }

        public function meetings(){
            $this->render('meetings');
        }

        public function addMeeting(){
            $this->render('addMeeting');
        }

        public function registration(){
            $this->render('registration');
        }

        public function addWalk() {
            $this->render('addWalk');
        }
    }