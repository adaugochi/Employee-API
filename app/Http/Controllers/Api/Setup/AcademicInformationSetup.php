<?php

namespace App\Http\Controllers\Api\Setup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AcademicInformation;

class AcademicInformationSetup extends Controller
{
    public function getAcademicInformation()
    {
        $acaInfos = AcademicInformation::get();
        return response()->json($acaInfos);
    }

    public function addAcademicInformation(Request $request)
    {
       $this->validate($request, [
           'program_name'     	=> 'required',
           'school_name'   		=> 'required',
           'school_address'    	=> 'required',
           'start_date'        	=> 'required',
           'end_date'        	=> 'required',
           'graduation_year'   	=> 'required',
           'branch_code'       	=> 'required',
           'school_code'       	=> 'required'
       ]);

       $acaInfo = new AcademicInformation;

       $acaInfo->program_name          = $request->input('program_name');
       $acaInfo->school_name       	   = $request->input('school_name');
       $acaInfo->school_address        = $request->input('school_address');
       $acaInfo->start_date            = $request->input('start_date');
       $acaInfo->end_date              = $request->input('end_date');
       $acaInfo->graduation_year       = $request->input('graduation_year');
       $acaInfo->reason_for_leave	   = $request->input('reason_for_leave');
       $acaInfo->branch_code           = $request->input('branch_code');
       $acaInfo->school_code           = $request->input('school_code');
       $acaInfo->raw                   = $request->input('raw');

       if ($acaInfo->save()) {
           return ['status' => true, 'message' => 'Academic Information created successfully!'];
       } else {
           return ['status' => false, 'message' => 'Error occurred while adding new academic information!'];
       }

       return response()->json($acaInfo);
    }

    public function updateAcademicInformation(Request $request, $id)
    {
       $this->validate($request, [
           'program_name'      => 'required',
           'school_name'   	   => 'required',
           'school_address'    => 'required',
           'start_date'        => 'required',
           'end_date'          => 'required',
           'graduation_year'   => 'required',
           'branch_code'       => 'required',
           'school_code'       => 'required'
       ]);

       $acaInfo = AcademicInformation::find($id);

       $acaInfo->program_name          = $request->input('program_name');
       $acaInfo->school_name       	   = $request->input('school_name');
       $acaInfo->school_address        = $request->input('school_address');
       $acaInfo->start_date            = $request->input('start_date');
       $acaInfo->end_date              = $request->input('end_date');
       $acaInfo->graduation_year       = $request->input('graduation_year');
       $acaInfo->reason_for_leave	   = $request->input('reason_for_leave');
       $acaInfo->branch_code           = $request->input('branch_code');
       $acaInfo->school_code           = $request->input('school_code');
       $acaInfo->raw                   = $request->input('raw');

       if($acaInfo->save()){
           return ['status' => true, 'message' => 'Academic Information updated successfully!'];
       }else{
           return ['status' => false, 'message' => 'Error occurred while updating academic information!'];
       }

       return response()->json($acaInfo);
   }

    public function deleteAcademicInformation($id)
    {
        $acaInfo = AcademicInformation::find($id);

        $response = $acaInfo->delete();

        if($response){
            return ['status' => true, 'message' => 'Academic Information deleted successfully!'];
        }else{
            return ['status' => false, 'message' => 'Error occurred while deleting academic information!'];
        }
    }

}
