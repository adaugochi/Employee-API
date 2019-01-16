<?php

namespace App\Http\Controllers\Api\Setup;

use App\Models\EmployeeDept;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeeDeptSetup extends Controller
{
    public function getEmployeeDept()
    {
    	$models = EmployeeDept::all();
    	return response()->json($models);
    }

    public function addEmployeeDept(Request $request) 
    {
        $this->validate($request, [
        	'emp_dept_name' => 'required',
        	'emp_dept_code' => 'required',
        	'branch_code'   => 'required',
        	'school_code'   => 'required'
        ]);
          
        $empDept = new EmployeeDept;

        $empDept->emp_dept_name = $request->input('emp_dept_name');
        $empDept->emp_dept_code = $request->input('emp_dept_code');
        $empDept->branch_code   = $request->input('branch_code');
        $empDept->school_code   = $request->input('school_code');
        $empDept->raw           = $request->input('raw');
            
        if($empDept->save()){
            return ['status' => true, 'message' => 'Employee department created successfully!'];
        }else{
            return ['status' => false, 'message' => 'Error occurred while adding new employee department!'];
        }

        return response()->json($empDept);
        
    }

    public function updateEmployeeDept(Request $request, $id) 
    {
        $this->validate($request, [
        	'emp_dept_name' => 'required',
        	'emp_dept_code' => 'required',
        	'branch_code'   => 'required',
        	'school_code'   => 'required'
        ]);
          
        $empDept = EmployeeDept::find($id);

        $empDept->emp_dept_name = $request->input('emp_dept_name');
        $empDept->emp_dept_code = $request->input('emp_dept_code');
        $empDept->branch_code   = $request->input('branch_code');
        $empDept->school_code   = $request->input('school_code');
        $empDept->raw           = $request->input('raw');
            
        if($empDept->save()){
            return ['status' => true, 'message' => 'Employee department created successfully!'];
        }else{
            return ['status' => false, 'message' => 'Error occurred while adding new employee department!'];
        }

        return response()->json($empDept);
        
    }

    public function deleteEmployeeDept(Request $request, $id)
    {
    	$empDept = EmployeeDept::find($id);

    	$response = $empDept->delete();

    	if($response){
            return ['status' => true, 'message' => 'Employee department deleted successfully!'];
        }else{
            return ['status' => false, 'message' => 'Error occurred while deleting employee department!'];
        }
    }     
}
