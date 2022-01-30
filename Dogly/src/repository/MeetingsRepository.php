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

    public function getMeetings(): ?array {
        $result = [];
        $stmt = parent::getRepository()->connect()->prepare('
            SELECT * FROM meetings
        ');

        $stmt->execute();
        $meetings = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($meetings as $meeting) {
            $result[] = new Meeting(
                $meeting['place'],
                $meeting['date'],
                $meeting['description'],
                $meeting['file'],
                $meeting['going'],
                $meeting['interested'],
                $meeting['id'],
            );
        }
        return  $result;
    }

    public function addMeeting(Meeting $meeting) : void {
        $stmt = parent::getRepository()->connect()->prepare('
         INSERT INTO meetings (place, date, interested, going, description, id_assigned_by, file)
         VALUES (?, ?, ?, ?, ?, ?, ?)
        ');

        $assigned_by = 12;
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

    public function getMeetingByTitle(string $searchString) {
        $searchString = '%'.strtolower($searchString).'%';
        $stmt = parent::getRepository()->connect()->prepare('
        SELECT * FROM meetings WHERE LOWER(header) LIKE :search OR LOWER(description) LIKE :search
        ');

        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function going(int $id)
    {
        $stmt = parent::getRepository()->connect()->prepare('
            UPDATE meetings SET going = going + 1 WHERE id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function interested(int $id)
    {
        $stmt = parent::getRepository()->connect()->prepare('
            UPDATE meetings SET interested = interested + 1 WHERE id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}