<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Meeting.php';
require_once __DIR__.'/../repository/MeetingsRepository.php';

class MeetingsController extends AppController
{

    const MAX_FILE_SIZE = 1024*1024;
    const  UPLOAD_DIRECTORY = '/../public/uploads/';
    const SUPPORTED_TYPES = ['image/png', 'image/PNG', 'image/jpeg', 'image/JPEG'];

    private $meetingsRepository;
    private $message = [];

    public function __construct()
    {
        parent::__construct();
        $this->meetingsRepository = new MeetingsRepository();
    }


    public function meetings(){
        $meetings = $this->meetingsRepository->getMeetings();
        $this->render('meetings', ['meetings' => $meetings]);
    }


    public function addMeeting() {
        if ($this->isPost()
            && is_uploaded_file($_FILES['file']['tmp_name'])
            && $this->validate($_FILES['file'])){
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            $meeting = new Meeting(
                $_POST['place'],
                $_POST['date'],
                $_POST['description'],
                $_FILES['file']['name']
            );
            $this->meetingsRepository->addMeeting($meeting, $_COOKIE['id_user']);

            return $this->render('meetings', [
                'meetings' => $this->meetingsRepository->getMeetings(),
                'messages' => $this->message
            ]);
        }

        return $this->render('addMeeting', ['messages' => $this->message]);
    }

    public function search() {
        $contendType = isset($_SERVER["CONTEND_TYPE"]) ? trim($_SERVER["CONTEND_TYPE"]) : '';

        if($contendType === 'application/json') {
            $contend = trim(file_get_contents("php://input"));
            $decoded = json_decode($contend, true);

            header('Contend-Type: application/json');
            http_response_code(200);
            echo json_encode($this->meetingsRepository->getMeetingByTitle($decoded['search']));
        }
    }

    public function going(int $id, string $columnName) {
        $this->incrementColumnValue($id, $columnName);
    }

   public function interested(int $id, string$columnName) {
       $this->incrementColumnValue($id, $columnName);
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

    private function incrementColumnValue(int $id, string $columnName) {
        $this->meetingsRepository->incrementColumn($id, $columnName);
        http_response_code(200);
    }
}