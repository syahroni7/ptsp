<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TotalLayananPerHari extends Model
{

    protected $table = "total_layanan_perhari";

    protected $primaryKey = 'id_total_layanan_perhari';
 
    protected $guarded = [];
    
   
}