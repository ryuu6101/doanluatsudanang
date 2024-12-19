<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lawyer extends Model
{
    use HasFactory, Filterable;

    protected $fillable = [
        'fullname',
        'slug',
        'profile_pic',
        'card_number',
        'workplace',
        'organization_id',
        'birthday',
        'card_issuance_date',
    ];

    protected $casts = [
        'birthday' => 'datetime',
        'card_issuance_date' => 'datetime',
    ];

    public function organization() {
        return $this->belongsTo(Organization::class, 'organization_id');
    }
}