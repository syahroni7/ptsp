<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SyaratLayanan extends Model
{
    use SoftDeletes;

    protected $table = "daftar_syarat_layanan";

    protected $primaryKey = 'id_syarat_layanan';
 
    protected $guarded = [];
   
}