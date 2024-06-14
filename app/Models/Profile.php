<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = "profile";

    protected $primaryKey = 'profile_id';

    protected $fillable = [
        'username',
        'id',
        'bio'
    ];

    protected $hidden = [
      'id'  
    ];

    public function user() {
        return $this->belongsTo('App\Models\User', 'id');
    }
}
