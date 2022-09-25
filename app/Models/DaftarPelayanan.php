<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class DaftarPelayanan extends Model
{

    protected $table = "daftar_pelayanan";

    protected $primaryKey = 'id_pelayanan';
 
    protected $guarded = [];

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
   
}