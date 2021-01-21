<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    protected $fillable = [
        'user_id',
        'currency',
        'minimum'
    ];

    public function user(){

        return $this->belongsTo('App\User');
    }
}
