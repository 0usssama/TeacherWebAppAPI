<?php

namespace App\Http\Controllers\API;

use App\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $payments = Payment::all();
        foreach ($payments as $payment) {

            $payment->seance;
            $payment->student;
        }

        return $payments;
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

        $payment = new Payment();
        $payment->observation = $request->observation;
        $payment->price = $request->price;
        $payment->paymentDate = $request->paymentDate;

        $payment->seance_id = $request->seance_id;
        $payment->student_id = $request->student_id;
        $payment->save();

        $payment->seance;
        $payment->student;
        return $payment;
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
        //
        $payment = Payment::find($request->id);
        $payment->observation = $request->observation;
        $payment->price = $request->price;
        $payment->paymentDate = $request->paymentDate;
        $payment->seance_id = $request->seance_id;
        $payment->update();

        $payment->seance;
        $payment->seance->student;
        return $payment;

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
        $payment = Payment::find($id);
        $payment->delete();
        return response()->json([

            "message" => "Deleted",

        ]);
    }
}
