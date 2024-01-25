<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\HolidayHouse;
use App\Models\HolidayType;
use Illuminate\Http\Request;
use MongoDB\Driver\Query;

class HolidayHouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = HolidayHouse::with('city', 'holidayType')->latest();

        $holiday_houses = $query->paginate(5);

        return view('holiday_houses.index',compact('holiday_houses'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all();
        $holiday_types = HolidayType::all();
        return view('holiday_houses.create', compact('cities', 'holiday_types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'house_name' => 'required',
            'location' => 'required|exists:cities,id',
            'rooms_count' => 'required',
            'beds_count' => 'required',
            'holiday_house_type' => 'required|exists:holiday_types,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        HolidayHouse::create($input);

        return redirect()->route('holiday_houses.index')
            ->with('success','Holiday houses created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(HolidayHouse $holiday_house)
    {
        return view('holiday_houses.show',compact('holiday_house'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HolidayHouse $holiday_house)
    {
        $holiday_types = HolidayType::all();
        $cities = City::all();
        return view('holiday_houses.edit',compact('holiday_house', 'holiday_types', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HolidayHouse $holiday_house)
    {
        $request->validate([
            'house_name' => 'required',
            'location' => 'required|exists:cities,id',
            'rooms_count' => 'required',
            'beds_count' => 'required',
            'holiday_house_type' => 'required|exists:holiday_types,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {

            // Delete the old image
            $oldImage = $holiday_house->image;
            if($oldImage && file_exists(public_path('images/' . $oldImage))) {
                unlink(public_path('images/' . $oldImage));
            }

            // Save the new image
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move(public_path($destinationPath), $profileImage);
            $input['image'] = "$profileImage";
        }

        $holiday_house->update($input);

        return redirect()->route('holiday_houses.index')->with('success', 'Holiday house updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(HolidayHouse $holiday_house)
    {
        // Delete the image
        $image = $holiday_house->image;
        if($image && file_exists(public_path('images/' . $image))) {
            unlink(public_path('images/' . $image));
        }

        // Delete the author
        $holiday_house->delete();

        return redirect()->route('holiday_houses.index')->with('success', 'Holiday house deleted successfully');
    }
}
