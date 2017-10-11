<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'tb_laporan';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id','tugas_id','kajur_id','keterangan','status'];
    public $timestamps = true;

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function files() {
        return $this->hasMany(FileLaporan::class, 'laporan_id');
    }
}
