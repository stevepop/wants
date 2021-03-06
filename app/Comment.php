<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function want()
    {
        return $this->belongsTo(Want::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function url()
    {
        return $this->want->url().'#comment-'.$this->id;
    }

    public function isAuthor()
    {
        return $this->want
            ->comments
            ->sortBy('created_at')
            ->first()
            ->user
            ->is($this->user);
    }
}
