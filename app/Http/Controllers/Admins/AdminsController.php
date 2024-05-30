<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\Apartment\Apartment;
use App\Models\Booking\Booking;
use App\Models\Hotel\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AdminsController extends Controller
{
    public function viewLogin()
    {

        return view('admins.login');
    }

    public function checkLogin(Request $request)
    {


        $remember_me = $request->has('remember_me') ? true : false;

        if (Auth::guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {

            return redirect()->route('admins.dashboard');
        }
        return redirect()->back()->with(['error' => 'error logging in']);
    }

    public function index()
    {
        $adminsCount = Admin::select()->count();
        $roomsCount = Apartment::select()->count();
        $hotelsCount = Hotel::select()->count();

        return view('admins.index', compact('adminsCount', 'roomsCount', 'hotelsCount'));
    }

    public function allAdmins()
    {

        $admins = Admin::select()->orderBy('id', 'desc')->get();

        return view('admins.alladmins', compact('admins'));
    }

    public function createAdmins()
    {


        return view('admins.createadmins');
    }

    public function storeAdmins(Request $request)
    {
        $storeAdmins = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($storeAdmins) {

            return Redirect::route('admins.alladmins')->with(['success' => 'Admins created successfully']);
        }
    }

    public function allHotels()
    {

        $hotels = Hotel::select()->orderBy('id', 'desc')->get();

        return view('admins.allhotel', compact('hotels'));
    }

    public function createHotel()
    {


        return view('admins.createhotels');
    }

    public function storeHotel(Request $request)
    {

        Request()->validate([
            'name' => 'required|max:40',
            'image' => 'required|max:888',
            'description' => 'required',
            'location' => 'required|max:40',


        ]);

        $destinationPath = 'assets/images/';
        $myimage = $request->image->getClientOriginalName();
        $request->image->move(public_path($destinationPath), $myimage);

        $storeHotels = Hotel::create([
            'name' => $request->name,
            'image' => $myimage,
            'description' => $request->description,
            'location' => $request->location,

        ]);
        if ($storeHotels) {

            return Redirect::route('hotel.all')->with(['success' => 'Hotels created successfully']);
        }
    }

    public function editHotel($id)
    {
        $hotel = Hotel::find($id);

        return view('admins.edithotels', compact('hotel'));
    }

    public function updateHotel(Request $request, $id)
    {

        Request()->validate([
            'name' => 'required|max:40',

            'description' => 'required',
            'location' => 'required|max:40',


        ]);

        $hotel = Hotel::find($id);
        $hotel->update($request->all());

        if ($hotel) {

            return Redirect::route('hotel.all')->with(['update' => 'updated successfully']);
        }
    }

    public function deleteHotel($id)
    {

        $hotel = Hotel::find($id);

        if (FacadesFile::exists(public_path('assets/images/' .  $hotel->image))) {
            FacadesFile::delete(public_path('assets/images/' .  $hotel->image));
        } else {
            //dd('File does not exists.');
        }

        $hotel->delete();

        if ($hotel) {

            return Redirect::route('hotel.all')->with(['delete' => 'Hotel deleted successfully']);
        }
    }

    public function allRooms()
    {

        $rooms = Apartment::select()->orderBy('id', 'desc')->get();


        return view('admins.allrooms', compact('rooms'));
    }

    public function createRooms()
    {

        $hotels = Hotel::all();

        return view('admins.createrooms', compact('hotels'));
    }

    public function storeRooms(Request $request)
    {

       

        $destinationPath = 'assets/images/';
        $myimage = $request->image->getClientOriginalName();
        $request->image->move(public_path($destinationPath), $myimage);

        $storeRooms = Apartment::create([

            'name' => $request->name,
            'image' =>  $myimage,
            'max_persons' => $request->max_persons,
            'size' => $request->size,
            'view' => $request->view,
            'num_beds' => $request->num_beds,
            'hotel_id' => $request->hotel_id,
            'price' => $request->price,

        ]);

        if ($storeRooms) {

            return Redirect::route('all.rooms')->with(['success' => 'Room created successfully']);
        }
    }

    public function deleteRooms($id)
    {

        $rooms = Apartment::find($id);

        if (FacadesFile::exists(public_path('assets/images/' .  $rooms->image))) {
            FacadesFile::delete(public_path('assets/images/' .  $rooms->image));
        } else {
            //dd('File does not exists.');
        }

        $rooms->delete();

        if ($rooms) {

            return Redirect::route('all.rooms')->with(['delete' => 'Room deleted successfully']);
        }
    }


    public function allBookings(){
        
        $bookings = Booking::select()->orderBy('id', 'desc')->get();

        return view('admins.allbooking', compact('bookings'));


    }

    public function editStatus($id){

        $booking= Booking::find($id);

        return view('admins.editstatus',compact('booking'));

    }

    public function updateStatus(Request $request ,$id){

        $stauts=Booking::find($id);
        $stauts->update($request->all());

        if ($stauts) {

            return Redirect::route('all.bookings')->with(['update' => 'status Updated successfully']);
        }

    }

    public function deleteStatus($id)
    {

        $booking = Booking::find($id);

       

        $booking->delete();

        return Redirect::route('all.bookings')->with(['delete' => 'Booking deleted successfully']);

    }
}
