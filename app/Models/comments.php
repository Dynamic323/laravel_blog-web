<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_id',
        'content',
        'user_id'
    ];

    public function post (){
        return $this->belongsTo(post::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }


}
