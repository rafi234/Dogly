<?php
require_once 'Repository.php';
require_once __DIR__.'/../models/Dog.php';

class DogRepository
{
    public function getDogUsingOwnerById(int $id): ?Dog
    {
        $stmt = parent::getRepository()->connect()->prepare('
        SELECT * FROM dog where id = :id
       ');

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $dog = $stmt->fetch(PDO::FETCH_ASSOC);

        if($dog == false){
            return null;
        }

        return new Dog(
            $dog['name'],
            $dog['breed'],
            $dog['age']
        );
    }
}