<?php

namespace App\Http\Controllers\Api\Setup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\EmploymentInformation;


class EmploymentInformationSetup extends Controller
{
    public  function getEmploymentInformation() {
        $empInfos = EmploymentInformation::all();
        return response()->json($empInfos, 200);
    }

    public function addEmploymentInformation(Request $request)
    {
       $this->validate($request, [
           'company_name'     	=> 'required',
           'employer_name'   	=> 'required',
           'start_date'        	=> 'required',
           'end_date'        	=> 'required',
           'position'   		=> 'required',
           'branch_code'       	=> 'required',
           'school_code'       	=> 'required'
       ]);

       $empInfo = new EmploymentInformation;

       $empInfo->company_name          = $request->input('company_name');
       $empInfo->employer_name         = $request->input('employer_name');
       $empInfo->employer_email        = $request->input('employer_email');
       $empInfo->start_date            = $request->input('start_date');
       $empInfo->end_date              = $request->input('end_date');
       $empInfo->position       	   = $request->input('position');
       $empInfo->branch_code           = $request->input('branch_code');
       $empInfo->school_code           = $request->input('school_code');
       $empInfo->raw                   = $request->input('raw');

       if ($empInfo->save()) {
           return ['status' => true, 'message' => 'Employment Information created successfully!'];
       } else {
           return ['status' => false, 'message' => 'Error occurred while adding new employment information!'];
       }

       return response()->json($empInfo, 200);
    }

    public function updateEmploymentInformation(Request $request, $id)
    {
       $this->validate($request, [
           'company_name'     	=> 'required',
           'employer_name'   	=> 'required',
           'start_date'        	=> 'required',
           'end_date'        	=> 'required',
           'position'   		=> 'required',
           'branch_code'       	=> 'required',
           'school_code'       	=> 'required'
       ]);

       $empInfo = EmploymentInformation::find($id);

       $empInfo->company_name          = $request->input('company_name');
       $empInfo->employer_name         = $request->input('employer_name');
       $empInfo->employer_email        = $request->input('employer_email');
       $empInfo->start_date            = $request->input('start_date');
       $empInfo->end_date              = $request->input('end_date');
       $empInfo->position       	   = $request->input('position');
       $empInfo->branch_code           = $request->input('branch_code');
       $empInfo->school_code           = $request->input('school_code');
       $empInfo->raw                   = $request->input('raw');

        if ($empInfo->save()) {
           return ['status' => true, 'message' => 'Employment Information updated successfully!'];
        } else {
           return ['status' => false, 'message' => 'Error occurred while updating employment information!'];
        }

       return response()->json($empInfo, 200);
    }

    public function deleteEmploymentInformation($id)
    {
        $empInfo = EmploymentInformation::find($id);

        $response = $empInfo->delete();

        if($response){
            return ['status' => true, 'message' => 'Employment Information deleted successfully!'];
        }else{
            return ['status' => false, 'message' => 'Error occurred while deleting employment information!'];
        }
    }
}
