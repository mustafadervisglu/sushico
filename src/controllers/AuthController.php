<?php

namespace Src\Controllers;

use Src\Services\LoginService;

class AuthController {
    private $loginService;

    public function __construct(LoginService $loginService) {
        $this->loginService = $loginService;
    }

    public function login() {
        return $this->loginService->login();
    }
}

