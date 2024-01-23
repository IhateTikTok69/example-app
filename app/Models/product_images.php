<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_images extends Model
{
    use HasFactory;
    protected $primaryKey = 'img_id';
    protected $guarded = [];
    public function product()
    {
        return $this->belongsTo(product::class);
    }
}
