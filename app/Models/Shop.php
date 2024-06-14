<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $primaryKey = 'shop_id';

    protected $fillable = [
        'shop_name',
        'description',
        'image',
        'lat',
        'long',
    ];


    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    
    public function review() {
        return $this->hasOne('App\Models\Review', 'review_id');
    }
}
