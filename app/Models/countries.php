<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class countries extends Model
{
    use HasFactory;
    protected $primaryKey = 'country_id';

    public function city()
    {
        return $this->hasMany(cities::class);
    }
}
