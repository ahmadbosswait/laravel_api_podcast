<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    //Table Name
    protected $table = 'episodes';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }

}
