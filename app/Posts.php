<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Posts extends Model
{
    protected $table      = 'posts';
    protected $primaryKey = 'id';
    public $timestamps    = TRUE;

    protected $fillable   = [
        'id',
        'user_id',
        'title', 
    	'description',
    	'img',
    	'status',
        'created_at',
    ];


}
