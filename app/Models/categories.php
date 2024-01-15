<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;
    protected $primaryKey = 'cat_id';

    public function sub_categories()
    {
        return $this->hasMany(sub_categories::class);
    }
    public function product()
    {
        return $this->hasMany(product::class);
    }
}
