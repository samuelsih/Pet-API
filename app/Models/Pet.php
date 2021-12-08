<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'gender',
        'weight',
        'description',
        'status',
        'taxonomy_id',
    ];

    
    public function taxonomy()
    {
        return $this->belongsTo(Taxonomy::class);
    }
}
