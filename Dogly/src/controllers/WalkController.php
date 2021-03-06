<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Walk.php';
require_once __DIR__.'/../repository/WalkRepository.php';

class WalkController extends AppController
{

    const MAX_FILE_SIZE = 1024*1024;
    const  UPLOAD_DIRECTORY = '/../public/uploads/';
    const SUPPORTED_TYPES = ['image/png', 'image/PNG', 'image/jpeg', 'image/JPEG'];

    private $walkRepository;
    private $dogRepository;
    private $message = [];

    public function __construct()
    {
        parent::__construct();
        $this->walkRepository = new WalkRepository();
        $this->dogRepository = new DogRepository();
    }

    public function walkPage(){
        $walks = $this->walkRepository->getWalks();
        $this->render('walkPage', ['walks' => $walks]);
    }

    public function addWalk() {
        if ($this->isPost()
            && is_uploaded_file($_FILES['file']['tmp_name'])
            && $this->validate($_FILES['file'])){
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );
            $id_user = $_COOKIE['id_user'];

            $dog_id = $this->dogRepository->getDogId($id_user, $_POST['dogAge'], $_POST['dogName']);

            if($dog_id === 0) {
                $this->dogRepository->addDog(new Dog($id_user, $_POST['dogName'], $_POST['dogAge']));
                $dog_id = $this->dogRepository->getDogId($id_user, $_POST['dogAge'], $_POST['dogName']);
            }

            $walk = new Walk(
                $dog_id,
                $_POST['dogName'],
                $_POST['dogAge'],
                $_POST['date']." ".$_POST['time'],
                $_POST['price'],
                $_FILES['file']['name']
            );

            $this->walkRepository->addWalk($walk, $id_user, $_COOKIE['id_user']);

            return $this->render('walkPage', [
                'walks' => $this->walkRepository->getWalks(),
                'messages' => $this->message
            ]);
        }

        return $this->render('addWalk', ['messages' => $this->message]);
    }

    public function addTopPriorityWalks() {
        return $this->render('mainPage', [
            'walks' => $this->walkRepository->getWalks(' ORDER BY id_dog'),
            'messages' => $this->message
        ]);

    }

    private function validate(array $file): bool
    {
        if ($file['size'] > self::MAX_FILE_SIZE) {
            $this->message[] = 'File is too large for destination file system.';
            return false;
        }

        if (!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->message[] = 'File type is not supported.';
            return false;
        }
        return true;
    }
}