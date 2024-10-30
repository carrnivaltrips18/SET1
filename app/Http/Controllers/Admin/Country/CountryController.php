<?php

namespace App\Http\Controllers\Admin\Country;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    public function index()
    {
        return view('admin.country.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'country_name' => 'required',
            'state' => 'required',
            'city' => 'required',
            'zip_code' => 'required',
        ]);

        $country = new Country();
        $country->country_name = $request->input('country_name');
        $country->state = $request->input('state');
        $country->city = $request->input('city');
        $country->zip_code = $request->input('zip_code');
        $country->save();

        return redirect()->route('admin.country.list')->with('status', 'Country created successfully!');
    }
    public function list()
    {
        $countries = Country::all();
        return view('admin.country.list', compact('countries'));
    }
    public function edit($id)
    {
        $country = Country::findOrFail($id);
        return view('admin.country.edit')->with('country', $country);
    }


    public function update($id, Request $request)
    {
        $country = Country::findOrFail($id);
        $country->country_name = $request->input('country_name');
        $country->state = $request->input('state');
        $country->city = $request->input('city');
        $country->zip_code = $request->input('zip_code');
        $country->save();
        return redirect()->route('admin.country.list');
    }
    public function delete($id)
    {
        $country = Country::findOrFail($id);
        $country->delete();
        return redirect()->route('admin.country.list');
    }
    

}
