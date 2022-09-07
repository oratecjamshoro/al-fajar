<?php

namespace App\Http\Controllers\admin\hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Employee_type;

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
        return view('admin.hr.employees.create',compact('employee_type'));
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
        $employee = new Employee;

        $employee->emp_name = $request->emp_name;
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
