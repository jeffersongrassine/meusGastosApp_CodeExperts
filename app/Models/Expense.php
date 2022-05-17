<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'amount',
        'description'
    ];

    // Fomantando o valor
    public function getAmountAttribute()
    {
        return $this->attributes['amount'] /100;
    }


    public function setAmountAttribute($prop)
    {
        return $this->attributes['amount'] = $prop * 100;

    }
   

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
