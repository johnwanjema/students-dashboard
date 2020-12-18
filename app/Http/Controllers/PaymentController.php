<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
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
//'amount','studentId'
        try{
            $validator = Validator::make($request->all(), [
                'amount' => 'required|integer|max:50',
                'studentId' => 'required|integer',
            ]);

            if ($validator->fails())
                return api_response(false,$validator->messages(), 200, 'error','invalid data sent', $request->all());

            $payment = new Payment();
            $payment->amount = $request['amount'];
            $payment->studentId = $request['studentId'];


            $payment->save();
            return api_response(true,null, 200, 'success','successfully saved payment', $payment);
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
            $payment = Payment::find($id);
            if(isset($request['amount']))
                $payment->amount = $request['amount'];
            if(isset($request['studentId']))
                $payment->studentId = $request['studentId'];


            $payment->save();
            return api_response(true,null, 200, 'success','successfully updated payment', $payment);
        }catch (\Exception $exception){
            return api_response(true,$exception->getMessage(), 200, 'error','error updating payment', $request->all());
        }

    }


    public function destroy($id)
    {
        try{
            $payment = Payment::find($id);
            $payment->delete();
            return api_response(true,null, 200, 'success','successfully deleted payment', $payment);
        }catch (\Exception $exception){
            return api_response(true,$exception->getMessage(), 200, 'success','error deleting payment', null);
        }
    }
}
