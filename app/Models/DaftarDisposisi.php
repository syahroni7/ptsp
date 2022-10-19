<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
 
class DaftarDisposisi extends Model
{
    use SoftDeletes;

    protected $table = "daftar_disposisi";

    protected $primaryKey = 'id_disposisi';
 
    protected $guarded = [];

    protected $appends = ['aksi_disposisi', 'created_at_human', 'created_at_short'];

    public function pelayanan() {
        return $this->belongsTo(DaftarPelayanan::class, 'id_pelayanan');
    }

    public function sender() {
        return $this->belongsTo(User::class, 'id_sender');
    }

    public function recipient() {
        return $this->belongsTo(User::class, 'id_recipient');
    }

    public function aksi() {
        return $this->belongsTo(MasterAksiDisposisi::class, 'id_aksi_disposisi');
    }

    public function getAksiDisposisiAttribute(){
        return $this->aksi->name;
    }

    public function getCreatedAtHumanAttribute(){
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['created_at'])->diffForHumans();
    }

    public function getCreatedAtShortAttribute(){
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['created_at'])->format('j M Y H:i:s');
    }
   
}