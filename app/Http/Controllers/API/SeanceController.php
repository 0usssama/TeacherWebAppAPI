<?php

namespace App\Http\Controllers\API;

use App\Time;
use App\Seance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $seances = Seance::all();

        foreach ($seances as $seance) {
            # code...
            $seance->students;
            $seance->times;
        }
        return $seances;
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
        $seance = new Seance();
        $seance->name = $request->name;
        $seance->state = "On";



        $seance->save();
        $seance->students()->attach($request->students);


     
            foreach ($request->students as $student) {
                # code...
                for ($i = 0; $i < 4; $i++) {
                    # code...
                    $newTime = new Time();
                    $newTime->seance_id = $seance->id;
                    $newTime->student_id = $student;
                    $newTime->save();
                }
            }
            $seance->students;
      



        return $seance;
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
        $seance = Seance::find($request->id);
        $seance->name = $request->name;
        $seance->state = $request->state;
        $seance->students()->sync($request->students);

        foreach ($request->students as $student) {

            $time = Time::where('student_id', $student)->where('seance_id', $seance->id)->get();
            if ($time->isEmpty()) {
                $newTime = new Time();
                for ($i = 0; $i < 4; $i++) {
                    $newTime->seance_id = $seance->id;
                    $newTime->student_id = $student;
                    $newTime->save();
                }
            }
        }

        $seance->update();
        $seance->students;

        return $seance;
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
        $seance = Seance::find($id);
        $seance->delete();
        return response()->json([

            "message" => "Deleted",

        ]);
    }
}
