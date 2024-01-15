<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sub_categories extends Model
{
    use HasFactory;
    protected $primaryKey = 'sub_cat_id';

    public function categories()
    {
        return $this->belongsTo(categories::class);
    }
    public function product()
    {
        return $this->hasMany(categories::class);
    }
}
