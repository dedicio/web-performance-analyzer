<?php

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

    public function findAll() {
        $stmt = $this->db->query('SELECT id, title, content FROM pages');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
