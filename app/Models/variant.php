<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class variant extends Model
{
    use HasFactory;
    protected $primaryKey = 'var_id';

    public function product()
    {
        return $this->belongsTo(product::class);
    }
}
