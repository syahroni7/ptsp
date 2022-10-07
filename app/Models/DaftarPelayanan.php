<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;
use Carbon\Carbon;
 
class DaftarPelayanan extends Model
{

    protected $table = "daftar_pelayanan";

    protected $primaryKey = 'id_pelayanan';
 
    protected $guarded = [];

    protected $appends = ['idx_pelayanan'];

    public function layanan() {
        return $this->belongsTo(DaftarLayanan::class, 'id_layanan');
    }

    public function unit() {
        return $this->belongsTo(UnitPengolah::class, 'id_unit_pengolah');
    }

    public function output() {
        return $this->belongsTo(OutputLayanan::class, 'id_output_layanan');
    }

    public function jenis() {
        return $this->belongsTo(JenisLayanan::class, 'id_jenis_layanan');
    }

    public function disposisi() {
        return $this->hasMany(DaftarDisposisi::class, 'id_pelayanan');
    }

    public function arsip() {
        return $this->hasOne(DaftarArsip::class, 'id_pelayanan', 'id_pelayanan');
    }

    public function getIdxPelayananAttribute()
    {
        return Hashids::encode($this->id_pelayanan);
    }


    
   
}