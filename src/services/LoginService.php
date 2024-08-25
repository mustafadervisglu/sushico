<?php

namespace Src\Services;

use Src\Utils\Redis;

class LoginService extends BaseService {
    public function login() {

        $rand = bin2hex(random_bytes(16));
        $hash = hash('sha256', $rand);
        Redis::set($hash, $rand, 5*60);
        return ["token" => $hash];
    }

}
