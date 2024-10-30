<?php

namespace App\Http\Controllers\Admin\SightseeingImg;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Sightseeing;
use App\Models\SightseeingImg;
class SightseeingImgController extends Controller
{
    public function index($id)
    {
        $sightseeing = Sightseeing::find($id);
        $sightseen = SightseeingImg::where('sightseeing_id', $sightseeing->id)->get();
        return view('admin.SightseeingImg.index', compact('sightseeing', 'sightseen'));
    }
    public function store(Request $request)
    { 
        // dd($request->all());
        $request->validate([
            'sightseeing_id' => 'required',
            'destination' => 'required',
            'location_wise' => 'required',
            'name' => 'required',
        ]);
        // dd($request->all());
            if ($request->hasFile('name')) {
                foreach ($request->file('name') as $file) {
                    $ext = $file->getClientOriginalExtension();
                    $imagename = "Sightseen_img/" . time() . '_' . uniqid() . '.' . $ext;
                    $file->move(public_path('Sightseen_img'), $imagename);
                    $sightseeingImg = new SightseeingImg();
                    $sightseeingImg->sightseeing_id = $request->sightseeing_id;
                    $sightseeingImg->destination = $request->destination;
                    $sightseeingImg->location_wise = $request->location_wise;
                    $sightseeingImg->name = $imagename; 
                    $sightseeingImg->save(); 
                }
            }
            return redirect()->route('admin.sightseeingimg.index', ['id' => $request->sightseeing_id])->with('success', 'Images uploaded successfully!');
        
        }
        public function list($sightseeing_id){
            $sightseen = SightseeingImg::findOrFail($sightseeing_id);
            return view('admin.SightseeingImg.index', compact('sightseen'));
        }
}