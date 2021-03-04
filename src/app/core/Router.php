<?php

namespace wimmelsoft\core;

class Router {
    public Request $request;
    public Response $response;
    public array $routes = [];

    public function __construct(Request $request, Response $response) {
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback) {
        $this->routes['get'][$path] = $callback;
    }

    public function resolve() {
        $method = $this->request->getMethod();
        $path = $this->request->getPath();
        $params = [];
        if ($this->isApiCall($path)) {
            $pathElements = explode('/', $path);
            $path = $this->removeParameterFromApiCall($pathElements);
            $params = ['id' => end($pathElements)];
            $this->request->setParams($params);
        }

        $callback = $this->routes[$method][$path] ?? false;

        if (!$callback) {
            $this->response->setStatus(404);
            return $this->delegateToView('_404');
        }

        if (is_string($callback)) {
            return  $this->delegateToView($callback);
        }

        return call_user_func($callback, $this->request, $this->response);

    }

    private function delegateToView($view) {
        Application::$app->view->render($view);
    }

    private function isApiCall($path) : bool {

        return  (explode('/', $path)[1] === 'api');
    }

    private function removeParameterFromApiCall(array $pathElements) {
        array_pop($pathElements);
        return implode('/', $pathElements);
    }

}
