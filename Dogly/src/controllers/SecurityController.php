<?php

require_once  'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController {
    public function login() {
        $userRepository = new UserRepository();

        if(!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST["login"];

        $user = $userRepository->getUser($email);

        if(!$user){
            return $this->render('login', ['messages' => ['User not exist']]);
        }

        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['User with this email does not exist.']]);
        }

        if (!password_verify($_POST["password"], $user->getPassword())) {
            return $this->render('login', ['messages' => ['Wrong password']]);
        }

        setcookie('id_user', $user->getId(), time() + (3600 * 3));

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/mainPage");
    }

}