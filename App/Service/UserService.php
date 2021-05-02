<?php

namespace App\Service;

use \App\Repository\UserRepositoryInterface;
use App\Service\Encryption\EncryptionServiceInterface;

class UserService implements UserServiceInterface {

    /**
     *
     * @var \App\Repostitory\UserRepositoryInterface
     */
    private $userRepository;

    /**
     *
     * @var Encryption\EncryptionServiceInterface;
     */
    private $encryptionService;

    public function __construct(UserRepositoryInterface $userRepository, EncryptionServiceInterface $encryptionService) {
        $this->userRepository = $userRepository;
        $this->encryptionService = $encryptionService;
    }

    public function currentUser(): ?\App\Data\UserDTO {
        if (!$_SESSION['id']) {
            return null;
        }
        return $this->userRepository->findOneById(intval($_SESSION['id']));
    }

    public function edit(\App\Data\UserDTO $userDTO): bool {
        $currentUser = $this->userRepository->findOneByUserName($userDTO->getUsername());
//        var_dump($currentUser);
//        exit;
        if (null === $currentUser) {

            return false;
        }

        $this->encryptPassword($userDTO);
        return $this->userRepository->update(intval($_SESSION['id']), $userDTO);
    }

    public function getAll(): \Generator {
        return $this->userRepository->findAll();
    }

    public function isLogged(): bool {
        if (!$this->currentUser()) {
            return false;
        }
        return true;
    }

    public function login(string $username, string $password): ?\App\Data\UserDTO {


        $userFromDB = $this->userRepository->findOneByUserName($username);


        if (null === $userFromDB) {
            return null;
        }
        if (false === $this->encryptionService->verify($password, $userFromDB->getPassword())) {
            return null;
        }
        return $userFromDB;
    }

    private function encryptPassword(\App\Data\UserDTO $userDTO): void {
        $plainPassword = $userDTO->getPassword();
        $passwordHash = $this->encryptionService->hash($plainPassword);
        $userDTO->setPassword($passwordHash);
    }

    public function register(\App\Data\UserDTO $userDTO, string $confirmPassword): bool {
        if ($userDTO->getPassword() !== $confirmPassword) {
            return false;
        }
        if (null !== $this->userRepository->findOneByUserName($userDTO->getUsername())) {
            return false;
        }
        $this->encryptPassword($userDTO);




        return $this->userRepository->insert($userDTO);
    }

}
