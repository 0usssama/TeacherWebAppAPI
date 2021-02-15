<?php

namespace App\Http\Controllers\API;

use App\Time;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Time::all();
    }

    public function one($seance_id, $student_id)
    {

        //
        $times = Time::where([
            ['seance_id', $seance_id],
            ['student_id', $student_id]
        ])->get();

        foreach ($times as $time) {
            # code...
            $time->student;
            $time->seance;
        }

        return $times;
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
        $mytime = Carbon::now();

        $time = Time::find($request->id);
        $time->type = $request->type;
        $time->validationDate = $mytime->toDateString();

        $time->update();

        return $time;
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
    }
}
