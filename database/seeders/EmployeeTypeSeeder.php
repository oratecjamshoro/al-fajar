<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee_type;

class EmployeeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $emp_types = [
          'Permanent',						
		  'Contract',							
		  'Daily Wages'													
         ];
      
         foreach ($emp_types as $emp_type) {
              Employee_type::create(['emp_type' => $emp_type]);
         }
    }
}
