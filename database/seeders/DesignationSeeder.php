<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Designation;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $designations = [
          'General Manager',						
		  'Account Officer',							
		  'Account Officer',							
		  'Data Entry Operator',							
		  'Field Supervisor',							
		  'Lab Supervisor',							
		  'Lab Supervisor',							
		  'Phe Operator',							
		  'Vehicle Washer',							
		  'MCCI',							
		  'MCC Helper',							
		  'MMT'	,		
		  'Office Boy',							
		  'Security Guard',							
		  'Technician',							
		  'Dairy Incharge',							
		  'Dairy Helper',							
		  'Yogurt Incharge',							
          'Yogurt Helper',							
          'City Sell Incharge',							
          'Dodhi Incharge',							
          'Dodhi Helper',							
          'Driver',							
          'Cook',							
          'Imam Sahab'							

         ];
      
         foreach ($designations as $designation) {
              Designation::create(['designation' => $designation]);
         }
    }
}
