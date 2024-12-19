<?php

namespace App\Repositories\Documents;

use App\Models\Document;
use App\Repositories\BaseRepository;

class DocumentRepository extends BaseRepository implements DocumentRepositoryInterface
{
    public function getModel() {
        return Document::class;
    }
}