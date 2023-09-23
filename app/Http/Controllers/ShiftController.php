<?php

namespace App\Http\Controllers;


use App\Http\Requests\shift\StoreShift;
use Carbon\Carbon;
use App\Models\Shift;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shifts = Shift::all();
        return view('shifts.index' , compact('shifts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('shifts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShift $request)
    {
        Shift::create([

            // 'startTime' => Carbon::parse($request->start_time)->format('H:i A'),
            'startTime' => $request->start_time,
            'endTime' => $request->end_time
        ]);
        return  redirect()->route('shifts.index')->with('status', 'Shift successfully created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Shift $shift)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shift  $shift)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreShift $request, Shift $shift)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shift $shift)
    {
        //
    }
}
