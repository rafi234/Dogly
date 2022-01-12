<?php
require_once 'Repository.php';
require_once __DIR__ . '/../models/Walk.php';

class WalkRepository extends  Repository
{
    public function getWalk(int $id): ?Walk {
       $stmt = parent::getRepository()->connect()->prepare('
    SELECT * FROM walk WHERE id = :id
');

       $stmt->bindParam(':id', $id, PDO::PARAM_INT);
       $stmt->execute();

       $walk = $stmt->fetch(PDO::FETCH_ASSOC);

       if($walk == false){
            return null;
       }

       return new Walk(
           $walk['name'],
           $walk['age'],
           $walk['date'],
           $walk['price'],
           $walk['image']
       );
    }

    public function addWalk(Walk $walk) : void {
        $date = new DateTime();
        $stmt = parent::getRepository()->connect()->prepare('
         INSERT INTO walk (id_dog, date, price, dog_picture, created_at, id_assigned_by)
         VALUES (?, ?, ?, ?, ?, ?)
        ');

        $assigned_by = 1;
        $id_dog = 1;

        $stmt->execute([
            $id_dog,
            $walk->getDate(),
            $walk->getPrice(),
            $walk->getImage(),
            $date->format('Y-m-d H:i'),
            $assigned_by
        ]);
    }
}