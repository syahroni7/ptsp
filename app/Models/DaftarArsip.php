<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DaftarArsip extends Model
{
    use SoftDeletes;

    protected $table = "daftar_arsip";

    protected $primaryKey = 'id_arsip';
 
    protected $guarded = [];
    
   
}