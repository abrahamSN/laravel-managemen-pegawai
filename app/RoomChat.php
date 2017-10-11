<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomChat extends Model
{
    protected $table = 'tb_room_chat';
    protected $primaryKey = 'id';
    protected $fillable = ['author_id','subj','body','penerima_id'];
    public $timestamps = true;

    public function author() {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function penerima() {
        return $this->belongsTo(User::class, 'penerima_id');
    }

    public function chat() {
        return $this->hasMany(Chat::class);
    }
}
