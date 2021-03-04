<?php


namespace wimmelsoft\core;


class Request {

    private array $params;

    public function getPath() {
        $path = $_SERVER['REQUEST_URI'];
        $position = strpos($path, '?');
        if ($position !== false) {
            $path = substr($path, 0, $position);
        }
        return $path;
    }

    public function getMethod() {
        return $method = strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function isPost() {
        return $this->getMethod() === 'post';
    }

    public function isGet() {
        return $this->getMethod() === 'get';
    }

    public function setParams($params): void {
        $this->params = $params;
    }

    public function getParams() : array {
        return $this->params;
    }
}
