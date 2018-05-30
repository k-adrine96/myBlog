<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersPosts extends Model
{
    protected $table      = 'users_posts';
    protected $primaryKey = 'id';
    public $timestamps    = FALSE;

    protected $fillable   = [
    	'id', 
    	'user_id',
    	'post_id'
    ];
}
