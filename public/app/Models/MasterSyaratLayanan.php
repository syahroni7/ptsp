<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
 
class MasterSyaratLayanan extends Model
{
    use SoftDeletes;

    protected $table = "master_syarat_layanan";

    protected $primaryKey = 'id_master_syarat_layanan';
 
    protected $guarded = [];
   
}