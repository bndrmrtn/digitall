<?php

namespace App\Models;


use A17\Twill\Models\Model;

class Contact extends Model
{
    protected $fillable = [
        'published',
        'name',
        'email',
        'subject',
        'message',
    ];
}
