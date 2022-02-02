<?php
require_once 'Repository.php';
require_once __DIR__.'/../models/Meeting.php';

class MeetingsRepository extends Repository
{

    public function getMeetings(string $restOfQuery = ''): ?array {
        $result = [];

        $query = 'SELECT * FROM meetings'." ".$restOfQuery;
        $stmt = parent::getRepository()->connect()->prepare($query);
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
                $meeting['id']
            );
        }
        return  $result;
    }

    public function addMeeting(Meeting $meeting, int $id_user) : void {

        $db = parent::getRepository()->connect();
        $stmt = $db->prepare('
         INSERT INTO meetings (place, date, description, id_assigned_by, file)
         VALUES (?, ?, ?, ?, ?) RETURNING id
        ');

        $stmt->execute([
            $meeting->getPlace(),
            $meeting->getDate(),
            $meeting->getDescription(),
            $id_user,
            $meeting->getFile()
        ]);

        $id_meeting = $db->lastInsertId();

        $stmt = $db->prepare('
        INSERT INTO user_meetings (id_user, id_meetings) VALUES (?, ?)
        ');

        $stmt->execute([
            $id_user,
            $id_meeting
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

    public function incrementColumn(int $id, string $columnName)
    {
        $restOfQuery = $columnName.' = '.$columnName.' + 1 ';
        $query = 'UPDATE meetings SET '.$restOfQuery.'WHERE id = :id';
        $stmt = parent::getRepository()->connect()->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}