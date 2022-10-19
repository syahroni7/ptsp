<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

 
class MasterAksiDisposisi extends Model
{
    use SoftDeletes;

    protected $table = "master_aksi_disposisi";

    protected $primaryKey = 'id_aksi_disposisi';
 
    protected $guarded = [];
   
}