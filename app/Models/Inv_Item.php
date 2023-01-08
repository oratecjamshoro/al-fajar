<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inv_Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'item_name'
   	 ];


   	public function getCategory()
    {
        return $this->hasOne('App\Models\Inv_Category','id','category_id');
    }

    protected static function boot()
    {
        parent::boot();
        self::creating(function($model){
            $model->user_id = auth()->id();
        });
    }
}
