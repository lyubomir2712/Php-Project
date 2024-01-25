<?php

namespace App\Http\Controllers;

use App\Models\HolidayType;
use Illuminate\Http\Request;

class HolidayTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $holiday_types = HolidayType::latest()->paginate(5);

        return view('holiday_types.index',compact('holiday_types'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('holiday_types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'holiday_type_name' => 'required'
        ]);

        $input = $request->all();

        HolidayType::create($input);

        return redirect()->route('holiday_types.index')
            ->with('success','Holiday type created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(HolidayType $holiday_type)
    {
        return view('holiday_types.show',compact('holiday_type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HolidayType $holiday_type)
    {
        return view('holiday_types.edit',compact('holiday_type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HolidayType $holiday_type)
    {
        $request->validate([
            'holiday_type_name' => 'required',

        ]);

        $input = $request->all();

        $holiday_type->update($input);

        return redirect()->route('holiday_types.index')
            ->with('success','Holiday type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HolidayType $holiday_type)
    {
        $holiday_type->delete();

        return redirect()->route('holiday_types.index')
            ->with('success','Holiday type deleted successfully');
    }
}
