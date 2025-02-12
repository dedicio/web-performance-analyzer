<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Page;

use App\Domain\Page\Page;
use App\Domain\Page\PageNotFoundException;
use App\Domain\Page\PageRepository;
use PDO;

class MySqlPageRepository implements PageRepository
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function findAll(): array {
        $stmt = $this->db->query('SELECT id, title, url FROM pages');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function save(Page $page): void {
        $stmt = $this->db->prepare('INSERT INTO pages (title, url, created_at, updated_at) VALUES (:title, :url, :created_at, :updated_at)');
        $stmt->execute([
            'title' => $page->title,
            'url' => $page->url,
            'created_at' => $page->createdAt->format('Y-m-d H:i:s'),
            'updated_at' => $page->updatedAt->format('Y-m-d H:i:s'),
        ]);
    }

    public function findPageById(int $id): Page {
        $stmt = $this->db->prepare('SELECT id, title, url FROM pages WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $page = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$page) {
            throw new PageNotFoundException();
        }

        return $page;
    }

    public function delete(int $id): void {
        $stmt = $this->db->prepare('DELETE FROM pages WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return;
    }

    public function update(Page $page) {
        $stmt = $this->db->prepare('UPDATE pages SET title = :title, url = :url, updated_at = :updated_at WHERE id = :id');
        $stmt->execute([
            'id' => $page->id,
            'title' => $page->title,
            'url' => $page->url,
            'updated_at' => $page->updatedAt->format('Y-m-d H:i:s'),
        ]);
    }
}
