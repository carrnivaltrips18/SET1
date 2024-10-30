<?php

namespace App\Http\Controllers\Admin\Car;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function list()
    {
        $cars = Car::all();
        return view('admin.car.list', compact('cars'));
    }
    public function index()
    {
        return view('admin.car.index');
    }
    public function store(Request $request)
    {
        $request -> validate([
            'car_type' => 'required',
            'destination'  => 'required',
            'pickup_location_wise'  => 'required',
            'pickup_sightseen_point'  => 'required',
            'drop_location_wise'  => 'required',
            'drop_sightseen_point'  => 'required',
            'price'  => 'required',
            'pick_session_price'  => 'required',
            'off_session_price'  => 'required',
        ]);
        $car = new Car();
        $car -> car_type = $request -> car_type;
        $car -> destination = $request -> destination;
        $car -> pickup_location_wise = $request -> pickup_location_wise;
        $car -> pickup_sightseen_point = $request -> pickup_sightseen_point;
        $car -> drop_location_wise = $request -> drop_location_wise;
        $car -> drop_sightseen_point = $request -> drop_sightseen_point;
        $car -> price = $request -> price;
        $car -> pick_session_price = $request -> pick_session_price;
        $car -> off_session_price = $request -> off_session_price;
        $car -> save();
        return redirect()->Route('admin.cars')->with('success','car add successfully');
    }
    public function edit($id)
    {
        $cars = Car::findOrFail($id);
        return view('admin.car.edit', compact('cars'));
    }
    public function update(Request $request , $id)
    {
        $request -> validate([
            'car_type' => 'required',
            'destination'  => 'required',
            'pickup_location_wise'  => 'required',
            'pickup_sightseen_point'  => 'required',
            'drop_location_wise'  => 'required',
            'drop_sightseen_point'  => 'required',
            'price'  => 'required',
            'pick_session_price'  => 'required',
            'off_session_price'  => 'required',
        ]);
        $car = Car::findOrFail($id);

        $car -> car_type = $request -> car_type;
        $car -> destination = $request -> destination;
        $car -> pickup_location_wise = $request -> pickup_location_wise;
        $car -> pickup_sightseen_point = $request -> pickup_sightseen_point;
        $car -> drop_location_wise = $request -> drop_location_wise;
        $car -> drop_sightseen_point = $request -> drop_sightseen_point;
        $car -> price = $request -> price;
        $car -> pick_session_price = $request -> pick_session_price;
        $car -> off_session_price = $request -> off_session_price;
        $car -> save();
        return redirect()->Route('admin.cars')->with('success','car update successfully');
    }
    public function delete($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();
        return redirect()->Route('admin.cars')->with('success','car update successfully');
    }
}