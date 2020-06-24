<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['name', 'text'];
}

/*public function name()
{
    return $this->belongsTo(User::class, 'name');
}*/
