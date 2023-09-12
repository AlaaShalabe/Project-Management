<?php

namespace App\Http\Controllers;

use App\Models\SubSpecialty;
use Illuminate\Http\Request;

class SubSpecialtyController extends Controller
{
    public function index()
    {
        $sub_specialties = SubSpecialty::all();
        // if ($specialties->isEmpty()) {
        //     $route = route('specialties.create');
        //     return redirect()->route('dashboard.home')->with(['warning' => 'No specialties yet! to add new click', 'route' => $route]);
        // }

        return view('admin.sub_specialties.index', compact('sub_specialties'));
    }

    public function create()
    {
        return view('admin.sub_specialties.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'specialty_id' => 'integer|exists:specialties,id'
        ]);

        SubSpecialty::create($data);
        return  redirect()->route('sub_specialties.index')->with('status', 'Spceialty successfully created');
    }

    public function edit(SubSpecialty $sub_specialty)
    {

        return view('admin.sub_specialties.edit', compact('sub_specialty'));
    }
    public function update(Request $request, SubSpecialty $sub_specialty)
    {
        $data = $request->validate([
            'name' => 'string',
        ]);


        $sub_specialty->update($data);
        return redirect()->route('sub_specialties.index')->with('status', 'sub_specialty successfully Updated.');
    }
    public function show(SubSpecialty $sub_specialty)
    {
        return view('admin.sub_specialties.show', compact('sub_specialty'));
    }


    public function destroy(SubSpecialty $sub_specialty)
    {
        $sub_specialty->delete();
        return redirect()->route('sub_specialties.index')->with('status', 'sub_specialty successfully deleted.');
    }
}
