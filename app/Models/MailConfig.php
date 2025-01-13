<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailConfig extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'username',
        'password',
        'from_addres',
        'from_name',
    ];
}
