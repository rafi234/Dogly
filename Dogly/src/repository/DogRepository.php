<?php
require_once 'Repository.php';
require_once __DIR__.'/../models/Dog.php';

class DogRepository extends Repository
{
    public function getDog(int $id): ?Dog
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
            $dog['id'],
            $dog['name'],
            $dog['age'],
            $dog['breed']
        );
    }


    public function getDogId(int $id_user, string $age, string $name) : int {
        $stmt = parent::getRepository()->connect()->prepare('
            SELECT * from dog where id_user = :id_user AND age = :age AND name = :name
        ');

        $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $stmt->bindParam(':age', $age, PDO::PARAM_STR);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->execute();
        $dog = $stmt->fetch(PDO::FETCH_ASSOC);

        return (int)$dog['id'];
    }

    public function addDog(Dog $dog) : void{
        $stmt = parent::getRepository()->connect()->prepare('
           INSERT INTO dog (id_user, name, breed, age)
         VALUES (?, ?, ?, ?)
        ');

        $stmt->execute([
            $dog->getId(),
            $dog->getName(),
            $dog->getBreed(),
            $dog->getAge()
        ]);
    }
}