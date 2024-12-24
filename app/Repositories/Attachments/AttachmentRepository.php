<?php

namespace App\Repositories\Attachments;

use App\Models\Attachment;
use App\Repositories\BaseRepository;

class AttachmentRepository extends BaseRepository implements AttachmentRepositoryInterface
{
    public function getModel() {
        return Attachment::class;
    }
}