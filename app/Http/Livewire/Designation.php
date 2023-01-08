<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Designation extends Component
{
    
    public $city_id = '';

    public function render()
    {
        $designations = DB::table('designations')->get()->pluck('designation','id');
        return view('livewire.designation',compact('designations'));
    }

    public function changeEvent($value)
    {
        $this->city_id = $value;
    }
}
