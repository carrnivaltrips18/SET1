<?php
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Profile\ProfileController;
use App\Http\Controllers\Admin\Country\CountryController;
use App\Http\Controllers\Admin\HotelCategory\HotelCategoryController;
use App\Http\Controllers\Admin\Hotel\HotelController;
use App\Http\Controllers\Admin\HotelRoom\RoomController;
use App\Http\Controllers\Admin\Car\CarController;
use App\Http\Controllers\Admin\Ferry\FerryController;
use App\Http\Controllers\Admin\Sightseeing\SightseeingController;
use App\Http\Controllers\Admin\SightseeingImg\SightseeingImgController;
use App\Http\Controllers\Admin\SightseeingPoint\SightseenPointController;
use App\Http\Controllers\Admin\Itinerary\ItineraryController;
use App\Http\Controllers\Admin\Day_Itinerary\Day_Wise_ItineraryController;

Route::prefix('admin/')->name('admin.')->middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'create'])->name('login');
    Route::post('login', [AuthController::class, 'store'])->name('login.check');
});

Route::prefix('admin/')->name('admin.')->middleware('RedirectAdminIfNotAuthenticated')->group(function () {
    // dashboard
    Route::prefix('dashboard')->name('dashboard.')->controller(DashboardController::class)->group(function() {
        Route::get('/', 'index')->name('index');
    });
    //profile update
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('profile/password', [ProfileController::class, 'updatePassword'])->name('password.update');

    Route::post('logout', [AuthController::class, 'destroy'])->name('logout');
    // country
    Route::get('country',[CountryController::class,'index'])->name('country');
    Route::POST('country',[CountryController::class,'store'])->name('country.store');
    Route::get('country/list',[CountryController::class,'list'])->name('country.list');
    Route::get('country/deit/{id}',[CountryController::class,'edit'])->name('country.edit');
    Route::put('country/update/{id}',[CountryController::class,'update'])->name('country.update');
    Route::delete('country/delete/{id}',[CountryController:: class,'delete'])->name('country.delete');
    // Hotel category

    Route::get('hotel/category',[HotelCategoryController::class,'index'])->name('hotel.category');
    Route::POST("hotel/category/add",[HotelCategoryController::class,'store'])->name('hotel.category.add');
    Route::get("hotel/category/edit/{id}",[HotelCategoryController::class,'edit'])->name('hotel.category.edit');
    Route::put("hotel/category/update/{id}",[HotelCategoryController::class,'update'])->name('hotel.category.update');
    Route::delete("hotel/category/delete/{id}",[HotelCategoryController::class,'delete'])->name('hotel.category.delete');

    // Hotel

    Route::get('/hotels/create/{id}', [HotelController::class, 'create'])->name('hotels.create');
    Route::post('/hotels', [HotelController::class, 'store'])->name('hotels.store');
    Route::get('/hotels/list', [HotelController::class, 'index'])->name('hotels.list');
    Route::get('/hotels/edit/{id}', [HotelController::class, 'edit'])->name('hotels.edit');
    Route::put('/hotels/update/{id}', [HotelController::class, 'update'])->name('hotels.update');
    Route::delete('/hotels/delete/{id}',[HotelController::class, 'delete'])->name('hotels.delete');

    // Hotel Room 

    // Route to display the form for creating a room for a specific hotel
    Route::get('/hotels/{id}/rooms', [RoomController::class, 'create'])->name('hotels.rooms');

    // Route to store the new room
    Route::post('/hotels/{id}/rooms', [RoomController::class, 'store'])->name('hotels.rooms.store');
    Route::get('hotels/{hotelId}/rooms/{roomId}/edit', [RoomController::class, 'edit'])->name('hotels.rooms.edit');
    Route::put('hotels/{hotelId}/rooms/{roomId}', [RoomController::class, 'update'])->name('hotels.rooms.update');
    Route::get('/hotel/room/list',[RoomController::class,'list'])->name('hotel.rooms.list');
    Route::delete('/hotel/room/{id}/delete', [RoomController::class, 'delete'])->name('hotel.room.delete');


    // Car

    Route::get('cars',[CarController::class, 'list'])->name('cars');
    Route::get('cars/create',[CarController::class, 'index'])->name('cars.create');
    Route::get('cars/edit/{id}',[CarController::class, 'edit'])->name('cars.edit');
    Route::post('cars/store',[CarController::class, 'store'])->name('cars.store');
    Route::put('cars/update/{id}',[CarController::class, 'update'])->name('cars.update');
    Route::delete('cars/delete/{id}',[CarController::class, 'delete'])->name('cars.delete');

    // Ferry

    Route::get('ferry/list',[FerryController::class, 'list'])->name('ferry');
    Route::get('ferry/index',[FerryController::class, 'index'])->name('ferry.index');
    Route::get('ferry/edit/{id}',[FerryController::class, 'edit'])->name('ferry.edit');
    Route::POST('ferry/store',[FerryController::class, 'store'])->name('ferry.store');
    Route::put('ferry/update/{id}',[FerryController::class, 'update'])->name('ferry.update');
    Route::delete('ferry/delelt/{id}',[FerryController::class, 'delete'])->name('ferry.delete');

    // Sightseeing

    Route::get('sightseeing/index',[SightseeingController::class, 'index'])->name('sightseeing.index');
    Route::post('sightseeing/store',[SightseeingController::class, 'store'])->name('sightseeing.store');
    Route::get('sightseeing/edit/{id}',[SightseeingController::class, 'edit'])->name('sightseeing.edit');
    Route::put('sightseeing/update/{id}',[SightseeingController::class, 'update'])->name('sightseeing.update');
    Route::delete('sightseeing/delete/{id}',[SightseeingController::class, 'delete'])->name('sightseeing.delete');

    // SIGHTSEEING_IMAGE

    Route::get('sightseeing/{id}/sightseeingimg', [SightseeingImgController::class, 'index'])->name('sightseeingimg.index');
    Route::POST('sightseeing/{id}/sightseeingimg',[SightseeingImgController::class, 'store'])->name('sightseeingimg.store');


    // shightseen point
    Route::get('sightseeing/{id}/sightseeingpoint',[SightseenPointController::class, 'index'])->name('shightseeingpoint.update');
    Route::put('sightseeing/{id}/sightseeingpoint', [SightseenPointController::class, 'update'])->name('shightseeingpoint.update');
    Route::get('sightseeing/{id}/edit/sightseeingpoint', [SightseenPointController::class, 'edit'])->name('shightseeingpoint.edit');
    Route::delete('sightseeing/{sightseeing}/sightseeingpoint/{id}', [SightseenPointController::class, 'delete'])->name('shightseeingpoint.delete');



    // Itinerary 


    Route::get('itinerary/index',[ItineraryController:: class, 'index'])->name('itinerary.form');
    Route::post('itinerary/store',[ItineraryController::class, 'store'])->name('itinerary.store');
    Route::get('itinerary/list',[ItineraryController::class, 'list'])->name('itinerary.list');
    Route::get('itinerary/edit/{id}', [ItineraryController::class, 'edit'])->name('itinerary.edit');
    Route::put('itinerary/update/{id}',[ItineraryController::class, 'update'])->name('itinerary.update');
    Route::delete('itinerary/delete/{id}',[ItineraryController::class, 'delete'])->name('itinerary.delete');

    Route::get('itinerary/{id}/slide',[ItineraryController::class, 'slide'])->name('itinerary.slide1');
    Route::post('itinerary/{id}/store',[ItineraryController::class, 'storeOrUpdate'])->name('itinerary.slide1.store');
    Route::put('itinerary/{id}/update',[ItineraryController::class, 'storeOrUpdate'])->name('itinerary.slide1.update');

    // day way itinerary 

    Route::get('itinerary/{id}/slide2',[Day_Wise_ItineraryController::class, 'index'])->name('itinerart.day');
    Route::post('itinerary/{id}/store',[Day_Wise_ItineraryController::class, 'UpdateOrStore'])->name('itinerart.slide2.store');
    Route::put('itinerary/slide2/{id}/update',[Day_Wise_ItineraryController::class, 'UpdateOrStore'])->name('itinerary.slide2.update');

});