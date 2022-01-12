<?php
require_once 'Repository.php';
require_once __DIR__.'/../models/Meeting.php';

class MeetingsRepository extends Repository
{
    public function getMeeting(int $id): ?Meeting {
       $stmt = parent::getRepository()->connect()->prepare('
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
           $meeting['interested'],
           $meeting['file']
       );
    }

    public function addMeeting(Meeting $meeting) : void {
        $stmt = parent::getRepository()->connect()->prepare('
         INSERT INTO meetings (place, date, interested, going, description, id_assigned_by, file)
         VALUES (?, ?, ?, ?, ?, ?, ?)
        ');

        $assigned_by = 1;
        $interested = 0;
        $going = 0;

        $stmt->execute([
            $meeting->getPlace(),
            $meeting->getDate(),
            $interested,
            $going,
            $meeting->getDescription(),
            $assigned_by,
            $meeting->getFile()
        ]);
    }
}