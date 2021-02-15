<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Payment;
use App\Student;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

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
        $students = Student::all();
        foreach ($students as $student) {
            # code...
            $student->seances;
            $student->payments;
        }
        return $students;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //create student

        //$request->validate()
        
      $student =   Student::create([
            'firstName'=> request('firstName'),
            'lastName'=> request('lastName'),
           'phoneNumber'=> request('phoneNumber'),
           'hiringDate'=> request('hiringDate'),
           'level'=> request('level'),
           'ref'=> request('ref')
        ]);

        $student->seances()->sync(request('seances'));
        $student->seances;
        return $student;
        


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $student = Student::find(request('id'));
       $student->update([
           'firstName' => request('firstName'),
           'lastName' => request('lastName'),
           'phoneNumber' => request('phoneNumber'),
           'hiringDate' => request('hiringDate'),
           'level' => request('level'),
            'ref' => request('ref')
       ]) ;
       $student->update();
       $student->seances;
       $student->payments;

       return $student;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $student = Student::find($id);
        $student->seances()->detach();
        
        $payments = Payment::where('student_id', $id)->get();
        
        foreach ($payments as $payment) {
            # code...
            $payment->delete();
        }

        $student->delete();

        return response()->json([
            "message"=> "Deleted"
        ]);
    }
}
