<?php

namespace App\Http;

use App\Repository;
use App\Data;
use App\Service\UserServiceInterface;
use App\Service\Tiles\TileServiceInterface;

class UserHttpHandler extends UserHttpHandlerAbstract {

    public function findTiles(TileServiceInterface $tileService) {
        if (isset($formData['search'])) {
            $this->handleFindProcess($tileService, $formData);
        } else {
            $this->render("tiles/find", $currentUser);
        }
    }

    public function index(UserServiceInterface $userService) {
        $this->render("home/index");
    }

    public function all(UserServiceInterface $userService) {
        $this->render("users/all", $userService->getAll());
    }

    public function profile(UserServiceInterface $userService, $formData = []) {
        if (!$userService->isLogged()) {

            $this->redirect('login.php');
        }
        $currentUser = $userService->currentUser();

        if (isset($formData['edit'])) {
            $this->handleEditProcess($userService, $formData);
        } else {
            $this->render("users/profile", $currentUser);
        }
    }

    public function register(UserServiceInterface $userService, array $formData = []) {
        if (isset($formData['register'])) {
            $this->handleRegisterProcess($userService, $formData);
        } else {
            $this->render("users/register");
        }
    }

    public function login(UserServiceInterface $userService, $formData = []) {
        if (isset($formData['login'])) {
            $this->handleLoginProcess($userService, $formData);
        } else {
            $this->render("users/login");
        }
    }

    public function handleRegisterProcess(UserServiceInterface $userService, $formData) {


        $user = $this->dataBinder->bind($formData, Data\UserDTO::class);
//        $user = Data\UserDTO::create(
//                        $formData['user_name'],
//                        $formData['password'],
//                        $formData['first_name'],
//                        $formData['last_name'],
//                        $formData['born_on']);

        /**
         * @var \App\Service\UserServiceInterface $userService
         */
        if ($userService->register($user, $formData['confirm_password'])) {
            $this->redirect("login.php");
        } else {
            
        }
    }

    public function handleLoginProcess(UserServiceInterface $userService, $formData) {


        $user = $userService->login($formData['user_name'], $formData['password']);
        if (null !== $user) {
            $_SESSION['id'] = $user->getId();
            $this->redirect("profile.php");
        } else {
            $this->render("users/login", null, new Data\ErrorDTO('Username does not exist or password mismatch'));
        }
    }

    public function handleEditProcess(UserServiceInterface $userService, $formData) {
        $user = $this->dataBinder->bind($formData, Data\UserDTO::class);
//        $user = $userService->currentUser();
//        $user->setUsername($formData['user_name']);
//        $user->setPassword($formData['password']);
//        $user->setFirstName($formData['first_name']);
//        $user->setLastName($formData['last_name']);
//        $user->setBornOn($formData['born_on']);

        if ($userService->edit($user)) {

            $this->redirect('profile.php');
        } else {
            
        }
    }

    public function handleFindProcess($tileService, $formData) {
        
    }

}
