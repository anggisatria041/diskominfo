<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aplikasi extends Model
{
     use HasFactory;
    protected $table='aplikasi';
    protected $fillable=["user_id","tgl_pengajuan","nama_aplikasi","keterangan"];
    protected $primaryKey = 'aplikasi_id';
}
