<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'name', 'description',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function coach(){
        return $this->belongsTo('App\Coach');
    }

    public function player() {
        return $this->belongsTo('App\Player');
    }

    public $timestamps = false;

}
