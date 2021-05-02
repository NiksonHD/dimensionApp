<?php



namespace App\Repository;


interface UserRepositoryInterface {
public function insert (\App\Data\UserDTO $userDTO): bool;


public function update(int $id,\App\Data\UserDTO $userDTO): bool;


public function delete(int $id,\App\Data\UserDTO $userDTO): bool;


public function findOneByUserName (string $username):?\App\Data\UserDTO;

public function findOneById(int $id): ?\App\Data\UserDTO;

/**
 * @return \Generator|\App\Data\UserDTO[]
 */
public function findAll(): \Generator;




}
