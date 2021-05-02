<?php



 
namespace App\Service;



use App\Data\UserDTO;


interface UserServiceInterface {

public function register(\App\Data\UserDTO$userDTO, string $confirmPassword): bool;

public function login(string $username, string $password):?\App\Data\UserDTO;

public function currentUser():?\App\Data\UserDTO;

public function isLogged():bool;


public function edit(\App\Data\UserDTO $userDTO):bool;

/**
 * 
 * @return \Generator|\App\Data\UserDTO
 */

public function getAll():\Generator;


}
