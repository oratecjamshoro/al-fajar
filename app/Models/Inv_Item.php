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


   	  public function Inv_Category()
    {
        return $this->belongsTo(Inv_Category::class);
    }
}
