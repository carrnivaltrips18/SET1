<?php

namespace App\Http\Controllers\Admin\HotelCategory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HotelCategory;

class HotelCategoryController extends Controller
{
    public function index()
    {
        $categories = HotelCategory::all();
        return view('admin.hotelcategory.index', compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            "destination" => "required",
            "location_wise" => "required",
            "category_wise" => "required"
        ]);
        $categories = new HotelCategory();
        $categories -> destination = $request->input('destination');
        $categories -> location_wise = $request->input('location_wise');
        $categories -> category_wise = $request->input('category_wise');
        $categories->save();
        return redirect()->route('admin.hotel.category')->with('success', 'Hotel Category added successfully.');
    }
    public function edit($id)
    {
        $categories = HotelCategory::findOrFail($id);
        return view('admin.hotel.category')->with('categories', $categories);
    }
    public function update($id, Request $request)
    {
        $categories = HotelCategory::findOrFail($id);
        $categories->destination = $request->input('destination');
        $categories->location_wise = $request->input('location_wise');
        $categories->category_wise = $request->input('category_wise');
        $categories->save();
        return redirect()->route('admin.hotel.category')->with('success', 'Hotel Category update successfully.');
    }
    public function delete($id)
    {
        $categories = HotelCategory::findOrFail($id);
        $categories->delete();
        return redirect()->route('admin.hotel.category')->with('success', 'Hotel Category delete successfully.');;
    }
}