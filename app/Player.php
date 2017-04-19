<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = ['is_captain', 'dorsal'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function team(){
        return $this->belongsTo('App\Team');
    }

    public function position() {
        return $this->belongsTo('App\Position');
    }
    public $timestamps = false;
}
