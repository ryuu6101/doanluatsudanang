<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactMail extends Model
{
    use HasFactory, Filterable;

    protected $fillable = [
        'fullname',
        'email',
        'phone',
        'address',
        'subject',
        'title',
        'contents',
        'read',
    ];
}
