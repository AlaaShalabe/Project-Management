<?php

namespace App\Http\Controllers;

use App\Models\Specialty;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    public function index()
    {
        $specialties = Specialty::all();
        // if ($specialties->isEmpty()) {
        //     $route = route('specialties.create');
        //     return redirect()->route('dashboard.home')->with(['warning' => 'No specialties yet! to add new click', 'route' => $route]);
        // }

        return view('admin.specialties.index', compact('specialties'));
    }

    public function create()
    {
        return view('admin.specialties.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
        ]);

        Specialty::create($data);
        return  redirect()->route('specialties.index')->with('status', 'Spceialty successfully created');
    }

    public function edit(Specialty $specialty)
    {

        return view('admin.specialties.edit', compact('specialty'));
    }
    public function update(Request $request, Specialty $specialty)
    {
        $data = $request->validate([
            'name' => 'string',
        ]);


        $specialty->update($data);
        return redirect()->route('specialties.index')->with('status', 'specialty successfully Updated.');
    }
    public function show(Specialty $specialty)
    {
        return view('admin.specialties.show', compact('specialty'));
    }


    public function destroy(Specialty $specialty)
    {
        $specialty->delete();
        return redirect()->route('specialties.index')->with('status', 'specialty successfully deleted.');
    }
}
