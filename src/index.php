<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Src\Controllers\DocumentController;
use Src\Middleware\AuthGuard;
use Src\Services\DocumentService;
use Src\Controllers\AuthController;
use Src\Services\LoginService;
use Src\Utils\ResponseHelper;

$pathInfo = $_SERVER["PATH_INFO"];
$token = $_GET['token'] ?? "";

$documentController = new DocumentController(new DocumentService());
$authController = new AuthController(new LoginService());

if ($pathInfo === '/document' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    AuthGuard::handle();

    if (isset($_GET['keyword'])) {
        ResponseHelper::response($documentController->getDocument($_GET['keyword']));
    } else if (isset($_GET['id'])) {
        ResponseHelper::response($documentController->getDocumentById($_GET['id']));
    }
} else if ($pathInfo === '/document' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    AuthGuard::handle();

    $data = json_decode(file_get_contents('php://input'), true);
    ResponseHelper::response($documentController->createDocument($data['title'], $data['content']));
} else if ($pathInfo === '/login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    ResponseHelper::response($authController->login(), "", 201);
} else {
    ResponseHelper::response("", "Not Found", 404);
}


