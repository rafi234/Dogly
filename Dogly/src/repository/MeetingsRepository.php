<?php
require_once 'Repository.php';
require_once __DIR__.'/../models/Meeting.php';

class MeetingsRepository extends  Repository
{
    public function getMeeting(int $id): ?Meeting {
       $stmt = $this->database->connect()->prepare('
    SELECT * FROM meetings WHERE id = :id
');

       $stmt->bindParam(':id', $id, PDO::PARAM_INT);
       $stmt->execute();

       $meeting = $stmt->fetch(PDO::FETCH_ASSOC);

       if($meeting == false){
            return null;
       }

       return new Meeting(
           $meeting['place'],
           $meeting['date'],
           $meeting['interested']
       );
    }

    public function addMeeting(Meeting $meeting) : void {
        $date = new DateTime();
        $stmt = $this->database->connect()->prepare('
         INSERT INTO meetings
        ');
    }
}