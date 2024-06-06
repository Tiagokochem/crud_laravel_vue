<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    use HasFactory;

    protected $fillable = [
        'level_id', 'name', 'gender', 'date_of_birth', 'age', 'hobby'
    ];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}


