<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{

    public function index()
    {
        $students = Student::orderBy('firstName','DESC')->get();
        return api_response(true,null, 200, 'success','successfully fetched all students', $students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
//'firstName','lastName','phoneNumber','regNumber'
        try{
            $validator = Validator::make($request->all(), [
                'firstName' => 'required|string|max:50',
                'lastName' => 'required|string|max:50',
                'phoneNumber' => 'required|string',
                'regNumber'=>'required|string',
            ]);

            if ($validator->fails()) {
//            Session::flash('error', $validator->messages()->first());
//            return redirect()->back()->withInput();
                return api_response(false,$validator->messages(), 200, 'error','invalid data sent', $request->all());
            }
            $student = new Student();
            $student->firstName = $request['email'];
            $student->lastName = $request['phoneNumber'];
            $student->phoneNumber = $request['category'];
            $student->regNumber = $request['subject'];


            $student->save();
            return api_response(true,null, 200, 'success','successfully saved student', $student);
        }catch (\Exception $exception){
            return api_response(true,$exception->getMessage(), 200, 'error','error saving student', $request->all());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //'firstName','lastName','phoneNumber','regNumber'
       try{
           $student = Student::find($id);
           if(isset($request['firstName']))
               $student->firstName = $request['firstName'];
           if(isset($request['lastName']))
               $student->lastName = $request['lastName'];
           if(isset($request['phoneNumber']))
               $student->phoneNumber = $request['phoneNumber'];
           if(isset($request['regNumber']))
               $student->regNumber = $request['regNumber'];

           $student->save();
           return api_response(true,null, 200, 'success','successfully updated student', $student);
       }catch (\Exception $exception){
           return api_response(true,$exception->getMessage(), 200, 'success','error updating student', $request->all());
       }

    }


    public function destroy($id)
    {
        try{
            $student = Student::find($id);

            $student->delete();
            return api_response(true,null, 200, 'success','successfully deleted student', $student);
        }catch (\Exception $exception){
            return api_response(true,$exception->getMessage(), 200, 'success','error deleting student', null);
        }
    }
}
