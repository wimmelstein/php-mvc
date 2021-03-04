<?php

namespace wimmelsoft\service;

use wimmelsoft\core\Application;

class UserService {

    private string $select_all_users = 'select * from users';
    private string $insert_user = 'INSERT INTO users  (first_name, last_name, age) VALUES (:first_name, :last_name, :age)';
    private string $select_one_user = 'SELECT * FROM users where id=:id';

    function getUsers() {
        $result = Application::$app->pdo->query($this->select_all_users);
        return $result;
    }

    function persistUser($first_name, $last_name, $age)
    {
        $stmt = Application::$app->pdo->prepare($this->insert_user);
        $stmt->execute(['first_name' => $first_name, 'last_name' => $last_name, 'age' => $age]);
    }

    public function getUser($id) {
        $stmt = Application::$app->pdo->prepare($this->select_one_user);
        $stmt->execute(['id' => $id]);
        $user = $stmt->fetch();
        return $user ?? [];
    }

}
