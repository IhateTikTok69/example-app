<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $primaryKey = 'product_id';
    protected $guarded  = [];

    public function country()
    {
        return $this->hasMany(product_images::class);
    }
    public function categories()
    {
        return $this->belongsTo(categories::class);
    }
    public function sub_categories()
    {
        return $this->belongsTo(sub_categories::class);
    }
}
