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
    private $message = [];

    public function __construct()
    {
        parent::__construct();
        $this->walkRepository = new WalkRepository();
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

            $walk = new Walk(
                $_POST['dogName'],
                $_POST['dogAge'],
                $_POST['date']." ".$_POST['time'],
                $_POST['price'],
                $_FILES['file']['name']
            );
            $this->walkRepository->addWalk($walk);

            return $this->render('walkPage', [
                'walks' => $this->walkRepository->getWalks(),
                'messages' => $this->message
            ]);
        }

        return $this->render('addWalk', ['messages' => $this->message]);
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