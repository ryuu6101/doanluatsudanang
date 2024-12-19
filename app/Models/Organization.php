<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Organization extends Model
{
    use HasFactory, Filterable;

    protected $fillable = [
        'name',
        'slug',
        'phone',
        'email',
    ];

    public function lawyers() {
        return $this->hasMany(Lawyer::class, 'organization_id');
    }
}
