<?php


namespace app\controllers;

use wimmelsoft\core\Application;

class ApiController {

    public function __construct() {
    }

    public function getOneUser() {
        $id = (int)Application::$app->request->getParams()['id'];
        $user = Application::$app->userService->getUser($id) ;
        echo json_encode($user);
    }


}
