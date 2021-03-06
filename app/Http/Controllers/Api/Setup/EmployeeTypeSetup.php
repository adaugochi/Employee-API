<?php

namespace App\Http\Controllers\Api\Setup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\EmployeeType;


class EmployeeTypeSetup extends Controller
{
    public function getEmployeeType()
    {
        $empTypes = EmployeeType::all();
    	return response()->json($empTypes, 200);
    }

    public function addEmployeeType(Request $request)
    {
        $this->validate($request, [
        	'emp_type_name' => 'required',
        	'emp_type_code' => 'required',
        	'branch_code'   => 'required',
        	'school_code'   => 'required'
        ]);

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

        return response()->json($empType, 200);
    }

    public function updateEmployeeType(Request $request, $id)
    {
        $this->validate($request, [
        	'emp_type_name' => 'required',
        	'emp_type_code' => 'required',
        	'branch_code'   => 'required',
        	'school_code'   => 'required'
        ]);

        $empType = EmployeeType::find($id);

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

        return response()->json($empType, 200);
    }

    public function deleteEmployeeType($id)
    {
    	$empType = EmployeeType::find($id);

    	$response = $empType->delete();

    	if($response){
            return ['status' => true, 'message' => 'Employee type deleted successfully!'];
        }else{
            return ['status' => false, 'message' => 'Error occurred while deleting employee type!'];
        }
    }
}
