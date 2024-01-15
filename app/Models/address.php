<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    use HasFactory;
    protected $primaryKey = 'addr_id';

    public function country()
    {
        return $this->belongsTo(countries::class);
    }
    public function city()
    {
        return $this->belongsTo(cities::class);
    }
}
