<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Database\Eloquent\SoftDeletes;
 
class DaftarLayanan extends Model
{
    use SoftDeletes;

    protected $table = "daftar_layanan";

    protected $primaryKey = 'id_layanan';
 
    protected $guarded = [];

    protected $appends = ['idx_layanan'];

    public function unit() {
        return $this->belongsTo(UnitPengolah::class, 'id_unit_pengolah');
    }

    public function output() {
        return $this->belongsTo(OutputLayanan::class, 'id_output_layanan');
    }

    public function jenis() {
        return $this->belongsTo(JenisLayanan::class, 'id_jenis_layanan');
    }

    public function syarat() {
        return $this->belongsToMany(MasterSyaratLayanan::class, 'daftar_syarat_layanan', 'id_layanan', 'id_master_syarat_layanan')
        ->whereNull('daftar_syarat_layanan.deleted_at') // Table `group_user` has column `deleted_at`
        ->withTimestamps();
    }

    public function getIdxLayananAttribute()
    {
        return Hashids::encode($this->id_layanan);
    }
   
}