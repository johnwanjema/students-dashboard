<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try{
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'category' => 'required|string|max:50',
                'subject' => 'required|string',
                'description'=>'required|string',
            ]);

            if ($validator->fails()) {
//            Session::flash('error', $validator->messages()->first());
//            return redirect()->back()->withInput();
                return api_response(false,$validator->messages(), 200, 'error','invalid data sent', $request->all());
            }
            $message = new ContactUs();
            $message->email = $request['email'];
            $message->phoneNumber = $request['phoneNumber'];
            $message->category = $request['category'];
            $message->subject = $request['subject'];
            $message->description = $request['description'];

            $check = User::where('email',$request['email'])->first();
            if(is_null($check)){
                $message->isRegistered = "false";
            }else{
                $message->isRegistered = "true";
            }

            if ($request->hasFile('photo'))
            {
                $file      = $request->file('photo');
                $filename  = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $picture   = date('His').'-'.$filename;
                $file->move(public_path('contactUs'), $picture);
                $message->attachment  = $picture;
            }

            $message->save();
            return api_response(true,null, 200, 'success','successfully saved message', $message);
        }catch (\Exception $exception){
            return api_response(true,$exception->getMessage(), 200, 'error','error saving message', $request->all());
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
