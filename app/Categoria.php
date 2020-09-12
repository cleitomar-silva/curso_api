<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable =[
        'name',
        'description',
        'slug'
    ];

    public function realStates()
    {
        return $this->belongsToMany(Real_State::class);
    }
}
