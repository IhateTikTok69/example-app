<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rooms extends Model
{
    use HasFactory;
    protected $primaryKey = 'roomNum';
    protected $guarded = [];
    public function tranasactions()
    {
        return $this->hasMany(transactions::class);
    }
}
