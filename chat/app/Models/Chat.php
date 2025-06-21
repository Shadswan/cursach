<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillible = [
        'chat_name',
        'user_id',
    ];
    //тут будут связи 1:n ....
}
