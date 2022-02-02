<?php
require_once 'Repository.php';
require_once  'DogRepository.php';
require_once __DIR__ . '/../models/Walk.php';

class WalkRepository extends Repository
{
    public function addWalk(Walk $walk, int $id_dog, int $id_user): void
    {
        $date = new DateTime();
        $db = parent::getRepository()->connect();
        $stmt = $db->prepare('
         INSERT INTO walk (id_dog, date, price, dog_picture, created_at, id_assigned_by)
         VALUES (?, ?, ?, ?, ?, ?) RETURNING id
        ');

        $stmt->execute([
            $walk->getIdDog(),
            $walk->getDate(),
            $walk->getPrice(),
            $walk->getImage(),
            $date->format('Y-m-d H:i'),
            $id_dog
        ]);

        $id_walk = $db->lastInsertId();

        $stmt = $db->prepare('
        INSERT INTO user_walk (id_user, id_walk) VALUES (?, ?)
        ');

        $stmt->execute([
            $id_user,
            $id_walk
        ]);
    }

    public function getWalks(string $restOfQuery = ''): ?array
    {
        $result = [];
        $dogRepository = new DogRepository();
        $query = 'SELECT * FROM walk'.$restOfQuery;
        $stmt = parent::getRepository()->connect()->prepare($query);

        $stmt->execute();
        $walks = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($walks as $walk) {
            $dog = $dogRepository->getDog($walk['id_dog']);
            $result[] = new Walk(
                $dog->getId(),
                $dog->getName(),
                $dog->getAge(),
                $walk['date'],
                $walk['price'],
                $walk['dog_picture']
            );
        }

        return $result;
    }


}