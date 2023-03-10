<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retweet extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function comment(){
        return $this->hasMany(Comment::class, 'post_id');
    }
    public function retweets(){
        return $this->hasMany(Retweet::class, 'id');
    }

    public function reply(){
        return $this->hasMany(Reply::class);
    }
}
