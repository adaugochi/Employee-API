<?php

namespace App\Http\Controllers\Api\Setup;

use App\Models\EmployeePosition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeePositionSetup extends Controller
{
     public function getEmployeePosition()
    {
    	$models = EmployeePosition::all();
    	return response()->json($models);
    }

    public function addEmployeePosition(Request $request) 
    {
        $this->validate($request, [
        	'emp_position_name' => 'required',
        	'emp_position_code' => 'required',
        	'branch_code'       => 'required',
        	'school_code'       => 'required'
        ]);
          
        $empPos = new EmployeePosition;

        $empPos->emp_position_name = $request->input('emp_position_name');
        $empPos->emp_position_code = $request->input('emp_position_code');
        $empPos->branch_code       = $request->input('branch_code');
        $empPos->school_code       = $request->input('school_code');
        $empPos->emp_dept_id       = $request->input('emp_dept_id');
        $empPos->raw               = $request->input('raw');
            
        if($empPos->save()){
            return ['status' => true, 'message' => 'Employee position created successfully!'];
        }else{
            return ['status' => false, 'message' => 'Error occurred while adding new employee position!'];
        }

        return response()->json($empPos);
        
    }

    public function updateEmployeePosition(Request $request, $id) 
    {
        $this->validate($request, [
        	'emp_position_name' => 'required',
        	'emp_position_code' => 'required',
        	'branch_code'       => 'required',
        	'school_code'       => 'required'
        ]);
          
        $empPos = EmployeePosition::find($id);

        $empPos->emp_position_name = $request->input('emp_position_name');
        $empPos->emp_position_code = $request->input('emp_position_code');
        $empPos->branch_code       = $request->input('branch_code');
        $empPos->school_code       = $request->input('school_code');
        //$empPos->emp_dept_id       = $request->input('emp_dept_id');
        $empPos->raw               = $request->input('raw');
            
        if($empPos->save()){
            return ['status' => true, 'message' => 'Employee position created successfully!'];
        }else{
            return ['status' => false, 'message' => 'Error occurred while adding new employee position!'];
        }

        return response()->json($empPos);
        
    }

    public function deleteEmployeePosition(Request $request, $id)
    {
    	$empPos = EmployeePosition::find($id);

    	$response = $empPos->delete();

    	if($response){
            return ['status' => true, 'message' => 'Employee position deleted successfully!'];
        }else{
            return ['status' => false, 'message' => 'Error occurred while deleting employee position!'];
        }
    } 
}
