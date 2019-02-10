<?php

namespace App\Http\Controllers\Api\Setup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\EmployeeInformation;

class EmployeeInformationSetup extends Controller
{
    public function getEmployeeInformation()
    {
        $models = EmployeeInformation::all();
        return response()->json($models);
    }

    public function addEmployeeInformation(Request $request)
    {
        $this->validate($request, [
            'emp_firstname'     => 'required',
            'emp_middle_name'   => 'required',
            'emp_surname'       => 'required',
            'emp_photo'         => 'required',
            'emp_gender'        => 'required',
            'emp_dob'           => 'required',
            'emp_nationality'   => 'required',
            'emp_phone_number'  => 'required',
            'emp_email'         => 'required',
            'emp_marital_status'=> 'required',
            'emp_religion'      => 'required',
            'emp_code'          => 'required',
            'branch_code'       => 'required',
            'school_code'       => 'required'
        ]);

        $empInfo = new EmployeeInformation;

        $empInfo->emp_firstname         = $request->input('emp_firstname');
        $empInfo->emp_middle_name       = $request->input('emp_middle_name');
        $empInfo->emp_surname           = $request->input('emp_surname');
        $empInfo->emp_photo             = $request->input('emp_photo');
        $empInfo->emp_gender            = $request->input('emp_gender');
        $empInfo->emp_dob               = $request->input('emp_dob');
        $empInfo->emp_nationality       = $request->input('emp_nationality');
        $empInfo->emp_phone_number      = $request->input('emp_phone_number');
        $empInfo->emp_email             = $request->input('emp_email');
        $empInfo->emp_marital_status    = $request->input('emp_marital_status');
        $empInfo->emp_religion          = $request->input('emp_religion');
        $empInfo->emp_code              = $request->input('emp_code');
        $empInfo->branch_code           = $request->input('branch_code');
        $empInfo->school_code           = $request->input('school_code');
        $empInfo->emp_position_id       = $request->input('emp_position_id');
        $empInfo->emp_type_id           = $request->input('emp_type_id');
        $empInfo->raw                   = $request->input('raw');

        if($empInfo->save()){
            return ['status' => true, 'message' => 'Employee Information created successfully!'];
        }else{
            return ['status' => false, 'message' => 'Error occurred while adding new employee information!'];
        }

        return response()->json($empInfo);
    }

    public function updateEmployeeInformation(Request $request, $id)
    {
        $this->validate($request, [
            'emp_firstname'     => 'required',
            'emp_middle_name'   => 'required',
            'emp_surname'       => 'required',
            'emp_photo'         => 'required',
            'emp_gender'        => 'required',
            'emp_dob'           => 'required',
            'emp_nationality'   => 'required',
            'emp_phone_number'  => 'required',
            'emp_email'         => 'required',
            'emp_marital_status'=> 'required',
            'emp_religion'      => 'required',
            'emp_code'          => 'required',
            'branch_code'       => 'required',
            'school_code'       => 'required'
        ]);

        $empInfo = EmployeeInformation::find($id);

        $empInfo->emp_firstname         = $request->input('emp_firstname');
        $empInfo->emp_middle_name       = $request->input('emp_middle_name');
        $empInfo->emp_surname           = $request->input('emp_surname');
        $empInfo->emp_photo             = $request->input('emp_photo');
        $empInfo->emp_gender            = $request->input('emp_gender');
        $empInfo->emp_dob               = $request->input('emp_dob');
        $empInfo->emp_nationality       = $request->input('emp_nationality');
        $empInfo->emp_phone_number      = $request->input('emp_phone_number');
        $empInfo->emp_email             = $request->input('emp_email');
        $empInfo->emp_marital_status    = $request->input('emp_marital_status');
        $empInfo->emp_religion          = $request->input('emp_religion');
        $empInfo->emp_code              = $request->input('emp_code');
        $empInfo->branch_code           = $request->input('branch_code');
        $empInfo->school_code           = $request->input('school_code');
        $empInfo->emp_position_id       = $request->input('emp_position_id');
        $empInfo->emp_type_id           = $request->input('emp_type_id');
        $empInfo->raw                   = $request->input('raw');

        if($empInfo->save()){
            return ['status' => true, 'message' => 'Employee Information updated successfully!'];
        }else{
            return ['status' => false, 'message' => 'Error occurred while updating employee information!'];
        }

        return response()->json($empInfo);
    }

    public function deleteEmployeeInformation($id)
    {
        $empInfo = EmployeeInformation::find($id);

        $response = $empInfo->delete();

        if($response){
            return ['status' => true, 'message' => 'Employee Information deleted successfully!'];
        }else{
            return ['status' => false, 'message' => 'Error occurred while deleting employee information!'];
        }
    }
}
