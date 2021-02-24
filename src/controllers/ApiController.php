<?php


namespace app\controllers;

use app\core\Application;
use app\service\UserService;

class ApiController {

    public function __construct() {
    }

    public function getOneUser() {
        $id = (int)Application::$app->request->getParams()['id'];
        $user = Application::$app->userService->getUser($id) ;
        echo json_encode($user);
    }


}
