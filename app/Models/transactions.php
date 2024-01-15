<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transactions extends Model
{
    use HasFactory;
    protected $primaryKey = 'trans_id';
    public function getShortenedNameAttribute()
    {
        $names = explode(' ', $this->name);

        if (count($names) > 1) {
            $firstName = array_shift($names);
            $lastNameInitial = substr(end($names), 0, 1);
            return $firstName . ' ' . $lastNameInitial;
        }

        return $this->name;
    }
    public function user()
    {
        return $this->belongsTo(users::class);
    }
    public function product()
    {
        return $this->belongsTo(product::class);
    }
}
