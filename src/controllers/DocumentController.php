<?php
namespace Src\Controllers;

use Src\Services\DocumentService;

class DocumentController {
    private $documentService;

    public function __construct(DocumentService $documentService) {
        $this->documentService = $documentService;
    }
    public function createDocument($title, $content) {
        return $this->documentService->createDocument($title, $content);
    }
    public function getDocumentById($id) {
        return $this->documentService->getDocumentById($id);
    }
    public function getDocument($keyword) {
        return $this->documentService->getDocument($keyword);
    }
}
