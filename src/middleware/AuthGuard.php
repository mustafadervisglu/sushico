<?php
namespace Src\Middleware;

use Src\Utils\Redis;
use Src\Utils\ResponseHelper;

class AuthGuard {
    public static function handle() {
        $token = $_GET['token'] ?? '';
        if (empty($token)) {
            http_response_code(401);
            ResponseHelper::response('', 'Unauthorized', 400);
        }
        Redis::get($token) ?: ResponseHelper::response('', 'Unauthorized', 400);

        return true;
    }
}
