<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $primaryKey = 'review_id';

    protected $fillable = [
        'comment',
        'rating',
        'shop_id',
        'id',
    ];

    public function user() {
        return $this->hasOne('App\Models\User', 'id');
    }

    public function shop() {
        return $this->belongsTo('App\Models\Shop', 'shop_id');
    }

}
