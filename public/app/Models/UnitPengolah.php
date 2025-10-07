<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
 
class UnitPengolah extends Model
{
    use SoftDeletes;

    protected $table = "daftar_unit_pengolah";

    protected $primaryKey = 'id_unit_pengolah';
 
    protected $guarded = [];

    public function layanan() {
        return $this->hasMany(DaftarLayanan::class, 'id_unit_pengolah', 'id_unit_pengolah');
    }    
   
}