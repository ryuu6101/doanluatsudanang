<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteConfig extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'company_name',
        'address',
        'phone',
        'email',
        'site_name',
        'site_email',
    ];
}
