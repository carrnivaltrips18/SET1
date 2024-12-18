<?php

namespace App\Http\Controllers\Admin\Sightseeing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Sightseeing;

class SightseeingController extends Controller
{
    public function index(Request $request)
    {
        // Check if there is a search query
        $search = $request->input('search');

        // Search for ferries by destination
        $sightseeing = Sightseeing::when($search, function ($query) use ($search) {
            return $query->where('destination', 'LIKE', '%' . $search . '%'); // Adjust 'destination' as needed
        })->paginate(5);


        // $sightseeing = Sightseeing::all();
        return view('admin.sightseeing.index', compact('sightseeing','search'));
    }
    public function store(Request $request)
    {
        $request -> validate([
            'destination' => 'required',
            'location' => 'required',
        ]);
        $sightseeing = new Sightseeing();
        $sightseeing->destination=$request->destination;
        $sightseeing->location=$request->location;
        $sightseeing->save();
        return redirect()->back()->with('success','Add Sightseen Successfully');
    }
    public function edit($id)
    {
        $sightseeing = Sightseeing::findOrFail($id);
        return view('admin.sightseeing.index' , compact('sightseeing'));
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request -> validate([
            'destination' => 'required',
            'location' => 'required',
        ]);
        $sightseeing = Sightseeing::findOrFail($id);
        $sightseeing->destination=$request->destination;
        $sightseeing->location=$request->location;
        $sightseeing->save();
        return redirect()->back()->with('success','Updated Sightseen Successfully');

    }
    public function delete($id)
    {
        $sightseeing = Sightseeing::findOrfail($id);
        $sightseeing->delete();
        return redirect()->back()->with('success','Delete Sightseen Successfully');
    }
}
