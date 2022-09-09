<?php

namespace App\Http\Controllers\admin\hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Employee_type;
use App\Models\Designation;
use App\Models\User;
use Hash;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees= Employee::all();
        return view('admin.hr.employees.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee_type = Employee_type::all()->except(3)->pluck('emp_type','id');
        $designations = Designation::all()->pluck('designation','id');
        return view('admin.hr.employees.create',compact('employee_type','designations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $emp_code = rand(10000, 99999);
        $designation = Designation::where('id',$request->emp_designation)->first();

        if($designation->designation == "MCCI")
        {
            $input = $request->all();
            $input['password'] = Hash::make($input['password']);
        
            $user = User::create($input);
            $user->assignRole(['MCCI']);

            $employee = new Employee;
            $employee->emp_name = $request->name;
            $employee->emp_father_name = $request->father_name;
            $employee->emp_cnic = $request->emp_cnic;
            $employee->emp_contact = $request->phone;
            $employee->emp_type = $request->emp_type;
            $employee->emp_designation = $request->emp_designation;
            $employee->emp_sallary = $request->emp_sallary;
            $employee->emp_code = $emp_code;
            $employee->emp_photo = $request->emp_pic;
            $employee->status = "Active";

            $employee->save();

            return redirect('employees')->with('success',"Insert successfully");            
        }else{
        
            $employee = new Employee;
            $employee->emp_name = $request->name;
            $employee->emp_father_name = $request->father_name;
            $employee->emp_cnic = $request->emp_cnic;
            $employee->emp_contact = $request->phone;
            $employee->emp_type = $request->emp_type;
            $employee->emp_designation = $request->emp_designation;
            $employee->emp_sallary = $request->emp_sallary;
            $employee->emp_code = $emp_code;
            $employee->emp_photo = $request->emp_pic;
            $employee->status = "Active";

            $employee->save();

            return redirect('employees')->with('success',"Insert successfully");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
