<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quote extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'content',
        'author_id',
        'user_id',
    ];
}
