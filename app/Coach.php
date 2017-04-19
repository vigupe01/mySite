<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    protected $fillable = [];

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

    public function type(){
        return $this->belongsTo('App\Type');
    }
    public $timestamps = false;
}
