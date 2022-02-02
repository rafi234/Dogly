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
        $userRepository->setEnable(true, $user->getId());

       $url = "http://$_SERVER[HTTP_HOST]";
       header("Location: {$url}/mainPage");
    }

    public function logout() {
        $userRepository = new UserRepository();
        if(!$this->isPost()) {
            return;
        }

        $user_id = $_COOKIE['id_user'];
        $userRepository->setEnable(false, $user_id);
        setcookie('id_user', $user_id, time() - 1);

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/login");
    }

    public function mainPage()
    {
        $walkRepo = new WalkRepository();
        $meetingsRepo = new MeetingsRepository();
        $walks = $walkRepo->getWalks(' ORDER BY price DESC');
        $meetings = $meetingsRepo->getMeetings('ORDER BY going DESC');
        $this->render('mainPage', [
            'walks' => $walks,
            'meetings' => $meetings
        ]);
    }

}