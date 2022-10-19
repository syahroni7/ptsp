<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
 
class OutputLayanan extends Model
{
    use SoftDeletes;

    protected $table = "daftar_output_layanan";

    protected $primaryKey = 'id_output_layanan';
 
    protected $guarded = [];
   
}