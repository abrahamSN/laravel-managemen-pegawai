<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileLaporan extends Model
{
    protected $table = 'tb_file_laporan';
    protected $primaryKey = 'id';
    protected $fillable = ['laporan_id','filename'];
    public $timestamps = true;

    public function laporan() {
        return $this->belongsTo(Laporan::class, 'laporan_id');
    }
}
