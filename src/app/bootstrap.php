<?php

require_once dirname(__FILE__) . '/vendor/autoload.php';

class Bootstrap {
    public static function getConfig() {
        return
            [
                'db' => [
                    'hostname' => $_ENV['PHP_DB_HOST'],
                    'port' => $_ENV['PHP_DB_PORT'],
                    'username' => $_ENV['MYSQL_USER'],
                    'password' => $_ENV['MYSQL_ROOT_PASSWORD'],
                    'name' => $_ENV['MYSQL_DATABASE']
                ],
                'general' => [
                    'applicationName' => 'Inholland API'
                ]
            ];
    }
}
