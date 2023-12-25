<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rooms extends Model
{
    use HasFactory;
    protected $primaryKey = 'roomNum';

    public function facility()
    {
        return $this->hasOne(Facility::class, 'roomNum', 'roomNum');
    }
    public function tranasactions()
    {
        return $this->hasMany(transactions::class);
    }
}
