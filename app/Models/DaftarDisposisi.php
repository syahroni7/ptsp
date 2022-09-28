<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class DaftarDisposisi extends Model
{

    protected $table = "daftar_disposisi";

    protected $primaryKey = 'id_disposisi';
 
    protected $guarded = [];

    public function pelayanan() {
        return $this->belongsTo(DaftarPelayanan::class, 'id_pelayanan');
    }

    public function sender() {
        return $this->belongsTo(User::class, 'id_sender');
    }

    public function recipient() {
        return $this->belongsTo(User::class, 'id_recipient');
    }
   
}