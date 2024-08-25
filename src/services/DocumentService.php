<?php

namespace Src\Services;

use Src\Utils\ResponseHelper;

class DocumentService extends BaseService {
    public function createDocument(string $title, string $content) {
        try {
            $this->db->prepare('INSERT INTO documents (title, content) VALUES (:title, :content)')
                ->execute([
                    'title' => $title,
                    'content' => $content
                ]);
        } catch (\PDOException $e) {
            die($e->getMessage());
        }

        return true;
    }

    public function getDocumentById(int $id) {
        try {
            $stmt = $this->db->prepare('SELECT * FROM documents WHERE id = :id');
            $stmt->execute(['id' => $id]);
            $res = $stmt->fetch(\PDO::FETCH_ASSOC);
            if (!$res) {
                return ResponseHelper::response('', 'Document not found', 404);
            }
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

// get document like keyword
    public function getDocument(string $keyword) {
        try {
            $stmt = $this->db->prepare('SELECT id FROM documents WHERE content LIKE :keyword or title LIKE :keyword limit 10');
            $stmt->execute(['keyword' => "%$keyword%"]);

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            die($e->getMessage());
        }

    }
}
