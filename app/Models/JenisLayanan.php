<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

 
class JenisLayanan extends Model
{
    use SoftDeletes;


    protected $table = "daftar_jenis_layanan";

    protected $primaryKey = 'id_jenis_layanan';
 
    protected $guarded = [];
   
}