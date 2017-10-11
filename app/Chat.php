<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $table = 'tb_chat';
    protected $primaryKey = 'id';
    protected $fillable = [ 'body','author_id','room_chat_id'];
    public $timestamps = true;

    public function author() {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function room() {
        return $this->hasOne(RoomChat::class, 'room_id');
    }

}
