<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cities extends Model
{
    use HasFactory;
    protected $primaryKey = 'city_id';
    public function country()
    {
        return $this->belongsTo(countries::class);
    }
}
