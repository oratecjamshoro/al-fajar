<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MCC_Milk extends Model
{
    use HasFactory;

    protected $fillable = [
        'gv',
        'fat',
        'lr',
        'snf',
        'percentage',
        'ts',
        'temperature',
        'type',
        'date',
        'user_id',
        'mcc_id',
        'status'
   	 ];
    
    protected static function boot()
    {
        parent::boot();
        self::creating(function($model){
            $model->user_id = auth()->id();
        });
    }

    public function getMCC()
    {
        return $this->hasOne('App\Models\MCC','id','mcc_id');
    }
    public function getUser()
    {
        return $this->hasOne('App\Models\User','id','user_id');
    }
}
