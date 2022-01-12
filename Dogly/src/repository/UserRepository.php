<?php
require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';
class UserRepository extends  Repository
{


    public function getUser(string $email): ?User {
       $stmt = parent::getRepository()->connect()->prepare('
       SELECT * FROM users u 
           LEFT JOIN user_details ud on u.id_user_details = ud.id 
           LEFT JOIN address a on ud.id_address = a.id 
            WHERE email = :email
       ');

       $stmt->bindParam(':email', $email, PDO::PARAM_STR);
       $stmt->execute();

       $user = $stmt->fetch(PDO::FETCH_ASSOC);

       if($user == false){
            return null;
       }

       return new User(
           $user['email'],
           $user['password'],
           $user['name'],
           $user['surname'],
           $user['phone_number'],
           $user['street'],
           $user['country'],
           $user['postal_code']
       );
    }

    public function addUser(User $user) {
        $date = new DateTime();
        $db = parent::getRepository()->connect();

        $stmt = $db->prepare('
                INSERT INTO address (postal_code, street, country) VALUES (?, ?, ?) RETURNING id
       ');

        $postalCode = $user->getPostalCode();
        $street = $user->getStreet();
        $country = $user->getCountry();

        $stmt->execute([
            $postalCode,
            $street,
            $country
        ]);

        $id_address = $db->lastInsertId();

        $stmt = $db->prepare('
         INSERT INTO user_details (id_address, name, surname, phone_number)
         VALUES (?, ?, ?, ?) RETURNING id
        ');

        $name = $user->getName();
        $surname = $user->getSurname();
        $phone = $user->getPhone();

        $stmt->execute([
            $id_address,
            $name,
            $surname,
            $phone
        ]);

        $id_user_details = $db->lastInsertId();

        $stmt = parent::getRepository()->connect()->prepare('
         INSERT INTO users (id_user_details, email, password, salt, created_at)
         VALUES (?, ?, ?, ?, ?)
        ');

        $email = $user->getEmail();
        $password = $user->getPassword();
        $salt = 1234234; //TODO


        $stmt->execute([
            $id_user_details,
            $email,
            $password,
            $salt,
            $date->format('Y-m-d H:i')
        ]);
    }
}