<?php
 
namespace App\Models;
 
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TotalLayananPerMinggu extends Model
{

    protected $table = "total_layanan_perminggu";

    protected $primaryKey = 'id_total_layanan_perminggu';
 
    protected $guarded = [];

    protected $appends = ['week_range'];

    public function getWeekRangeAttribute(){
        $date = \Carbon\Carbon::now(); 
        $date->setISODate($this->year,$this->week_of_year); 
        
        $fromD = $date->startOfWeek(Carbon::MONDAY)->format('d');
        $fromF = $date->startOfWeek(Carbon::MONDAY)->format('M');
        $toF = $date->endOfWeek(Carbon::SUNDAY)->format('M');

        $toDFY = $date->endOfWeek(Carbon::SUNDAY)->format('d M Y');

        if($fromF == $toF) {
            return $fromD . ' - ' . $toDFY;
        } else {
            $fromDF = $date->startOfWeek(Carbon::MONDAY)->format('d M');
            return $fromDF . ' - ' . $toDFY;
        }
    }
    
   
}