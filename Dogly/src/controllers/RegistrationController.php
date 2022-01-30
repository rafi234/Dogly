<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Walk.php';
require_once __DIR__.'/../repository/WalkRepository.php';

class RegistrationController extends AppController
{

    const PASSWORD_PATTERN = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])/';
    const PASSWORD_MIN_LENGTH = 7;

    private $userRepository;
    private $message = [];

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function registration() {
        if ($this->isPost()
            && $this->checkIfDateIsCorrect($_POST['email'], $_POST['password'], $_POST['passwordConfirmation'])
        ) {

            $hashedPassword = password_hash($_POST['password'], PASSWORD_ARGON2ID);

            $user = new User(
                $_POST['email'],
                $hashedPassword,
                $_POST['name'],
                $_POST['surname'],
                $_POST['phone_number'],
                $_POST['country'],
                $_POST['street'],
                $_POST['postal_code']
            );
            $this->userRepository->addUser($user);
            $this->message[] = 'User with email: '.$_POST['email'].' has been created.';

            return $this->render('login', ['messages' => $this->message]);
        }

        return $this->render('registration', ['messages' => $this->message]);
    }

    private function checkIfDateIsCorrect(
        string $email,
        string $password,
        string $passwordConfirmation
    ): bool
    {
        $isDataCorrect = true;
        $sanitizedEmail = filter_var($email, FILTER_SANITIZE_EMAIL);

        if (filter_var($sanitizedEmail, FILTER_VALIDATE_EMAIL) == false
            || $sanitizedEmail!=$email) {
            $this->message[] = 'Incorrect email.';
            $isDataCorrect = false;
        }

        if (!preg_match(self::PASSWORD_PATTERN, $password)) {
            $this->message[] = 'Your password is too week. Password must contain big and small letter and number.';
            $isDataCorrect = false;
        }

        if(strlen($password) < self::PASSWORD_MIN_LENGTH){
            $this->message[] = 'Your password is too short. Password must be longer than 7 characters.';
            $isDataCorrect = false;
        }

        if($password !== $passwordConfirmation) {
            $this->message[] = 'Given passwords don\'t match';
            $isDataCorrect = false;
        }

        return $isDataCorrect;
    }
}