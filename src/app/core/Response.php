<?php


namespace wimmelsoft\core;


class Response {
    public int $status;


    public function setStatus(int $status) {
        http_response_code(404);
    }

}
