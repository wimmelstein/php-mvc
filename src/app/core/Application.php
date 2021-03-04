<?php


namespace wimmelsoft\core;

use \PDO;
use \PDOException;
use wimmelsoft\service\UserService;

class Application {

    public static Application $app;
    public Request $request;
    public Response $response;
    public Router $router;
    public static string $ROOT_DIR;
    public array $config;
    public View $view;
    public Sesssion $session;
    public PDO $pdo;
    public UserService $userService;
    public function __construct($rootDir, $config)
    {
        self::$app = $this;
        self::$ROOT_DIR = $rootDir;
        $this->config = $config;
        $this->request = new Request();
        $this->response = new Response();
        $this->view = new View();
        $this->session = new Sesssion();
        $this->session->set('applicationName', $config['general']['applicationName']);
        $this->router = new Router($this->request, $this->response);
        $this->pdo = $this->getPDO($config);
        $this->userService = new UserService();


    }

    private function getPDO($config): PDO {
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => true,
        ];

        $hostname = $config['db']['hostname'];
        $port = $config['db']['port'];
        $user = $config['db']['username'];
        $password = $config['db']['password'];
        $db = $config['db']['name'];
        $charset = 'utf8mb4';
        $dsn = "mysql:host=$hostname;port=$port;dbname=$db;charset=$charset";
        try {
            $_pdo = new PDO($dsn, $user, $password, $options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
        return $_pdo;
    }

    public function run()
    {
        $this->router->resolve();
    }


}
