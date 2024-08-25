<?php

namespace Src\Utils;

class ResponseHelper {
    public static function response($data = "", $error = "", $statusCode = 200) {
        http_response_code($statusCode);
        // set header json
        header('Content-Type: application/json');
        echo json_encode(['data' => $data, 'error' => $error]);
        exit();
    }
}
