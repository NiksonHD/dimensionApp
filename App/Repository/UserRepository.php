<?php

namespace App\Repository;

use App\Data\UserDTO;
use App\Service\UserServiceInterface;
use Database\DatabaseInterface;
use App\Repository;

class UserRepository implements UserRepositoryInterface {

    /**
     *
     * @var DatabaseInterface;
     */
    private $db;

    public function __construct(DatabaseInterface $database) {
        $this->db = $database;
    }

    public function delete(int $id, UserDTO $userDTO): bool {
        $this->db->query("DELETE from user_exercise WHERE id = ?")
                ->execute([$id]);

        return true;
    }

    public function findAll(): \Generator {
        return $this->db->query("SELECT 
                                id,
                                username, 
                                password, 
                                first_name AS firstName,
                                last_name AS lastName, 
                                born_on AS bornOn 
                                FROM users
                                "
                        )->execute()
                        ->fetch(UserDTO::class);
    }

    public function findOneById(int $id): ?UserDTO {

        return $this->db->query("SELECT 
                                username,
                                password,
                                FROM users
                                WHERE id = ?"
                        )->execute([
                            $id
                        ])->fetch(UserDTO::class)
                        ->current();
    }

    public function findOneByUserName(string $username): ?UserDTO {
        return $this->db->query("SELECT 
                                id,
                                username,
                                password,
                                from users
                                WHERE username = ?"
                        )->execute([$username])
                        ->fetch(UserDTO::class)
                        ->current();
    }

    public function insert(UserDTO $userDTO): bool {


        $this->db->query("INSERT INTO users(username, password)"
                . "VALUES (?,?)"
        )->execute([
            $userDTO->getUsername(),
            $userDTO->getPassword()
        ]);


        return true;
    }

    public function update(int $id, UserDTO $userDTO): bool {
        $this->db->query("UPDATE user_exercise 
                SET username = ?,
                password = ?,
                first_name = ?,
                last_name = ?,
                born_on = ?
                WHERE id = ?"
        )->execute([
            $userDTO->getUsername(),
            $userDTO->getPassword(),
            $userDTO->getFirstName(),
            $userDTO->getLastName(),
            $userDTO->getBornOn(),
            $id
        ]);
        return true;
    }

}
