<?php

class UserController {

    public function register($username, $password, $email, $address) {
        global $pdo;
        $user = new User($pdo);
        return $user->register($username, $password, $email, $address);
    }

    public function createAdmin($username, $password, $email, $address, $role) {
        global $pdo;
        $user = new User($pdo);
        return $user->createAdmin($username, $password, $email, $address, $role);
    }

    public function login($username, $password) {
        global $pdo;
        $user = new User($pdo);
        return $user->login($username, $password);
    }

    public function getAll() {
        global $pdo;
        $user = new User($pdo);
        return $user->getAll();
    }

    public function getById($id_user) {
        global $pdo;
        $user = new User($pdo);
        return $user->getById($id_user);
    }

    public function update($id_user, $username, $password, $email, $address, $role) {
        global $pdo;
        $user = new User($pdo);
        return $user->update($id_user, $username, $password, $email, $address, $role);
    }

    public function delete($id_user) {
        global $pdo;
        $user = new User($pdo);
        return $user->delete($id_user);
    }

    public function forgotPassword($email) {
        global $pdo;
        $user = new User($pdo);
        return $user->forgotPass($email);
    }
}
?>