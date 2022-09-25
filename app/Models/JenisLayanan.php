<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class JenisLayanan extends Model
{

    protected $table = "daftar_jenis_layanan";

    protected $primaryKey = 'id_jenis_layanan';
 
    protected $guarded = [];
   
}