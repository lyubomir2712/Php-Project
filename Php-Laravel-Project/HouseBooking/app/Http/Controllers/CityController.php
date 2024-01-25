<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::latest()->paginate(5);

        return view('cities.index',compact('cities'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $request->validate([
                'city_name' => 'required',
            ]);

        $input = $request->all();

        City::create($input);

        return redirect()->route('cities.index')
            ->with('success','City created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        return view('cities.show',compact('city'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        return view('cities.edit',compact('city'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, City $city)
    {

    $request->validate([
        'city_name' => 'required',]);

        $input = $request->all();

        $city->update($input);

        return redirect()->route('cities.index')
            ->with('success','City updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        $city->delete();

        return redirect()->route('cities.index')
            ->with('success','City deleted successfully');
    }
}
