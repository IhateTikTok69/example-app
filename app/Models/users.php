<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    protected $primaryKey = 'user_id';
    use HasFactory;
    public function transactions()
    {
        return $this->hasMany(transactions::class);
    }
}
