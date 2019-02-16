<?php

namespace App\Http\GeneralService\Configurations;

use Illuminate\Http\Request;
use App\EmployeeType;

class EmployeeTypeSetup
{
    public static function getEmployeeType()
    {
        return EmployeeType::all();
    }

    public static function addEmployeeType(Request $request)
    {
        $empType = new EmployeeType;

        $empType->emp_type_name = $request->input('emp_type_name');
        $empType->emp_type_code = $request->input('emp_type_code');
        $empType->branch_code   = $request->input('branch_code');
        $empType->school_code   = $request->input('school_code');
        $empType->raw           = $request->input('raw');

        if($empType->save()){
            return ['status' => true, 'message' => 'Employee type created successfully!'];
        }else{
            return ['status' => false, 'message' => 'Error occurred while adding new employee type!'];
        }
    }

    public static function updateEmployeeType(Request $request)
    {
        $empType = EmployeeType::find($request->input('id'));

        $empType->emp_type_name = $request->input('emp_type_name');
        $empType->emp_type_code = $request->input('emp_type_code');
        $empType->branch_code   = $request->input('branch_code');
        $empType->school_code   = $request->input('school_code');
        $empType->raw           = $request->input('raw');

        if($empType->save()){
            return ['status' => true, 'message' => 'Employee type updated successfully!'];
        }else{
            return ['status' => false, 'message' => 'Error occurred while updating existing employee type!'];
        }
    }

}
