<?php

namespace App\Http\Controllers\Hotels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apartment\Apartment;
use App\Models\Booking\Booking;
use App\Models\Hotel\Hotel;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;





class HotelsController extends Controller
{
   public function rooms($id)
   {

      $getrooms = Apartment::select()->orderBy('id', 'desc')->take(6)
         ->where('hotel_id', $id)->get();

      return view('hotel.rooms', compact('getrooms'));
   }



   public function roomDetails($id)
   {

      $getroom = Apartment::find($id);


      return view('hotel.roomdetails', compact('getroom'));
   }

   // Room Booking


   public function roomBooking(Request $request, $id)
   {
      $room = Apartment::find($id);

      $hotel = Hotel::find($id);
      if (strval(Carbon::now()->lessThan($request->check_in)) && strval(Carbon::now()->lessThan($request->check_out))) {


         if ($request->check_in < $request->check_out) {


            $datetime1 = new DateTime($request->check_in);
            $datetime2 = new DateTime($request->check_out);
            $interval = $datetime1->diff($datetime2);
            $days = $interval->format('%a'); //now do whatever you like with $days

            $bookRooms = Booking::create([
               'name' => $request->name,
               'email' => $request->email,
               'phone_number' => $request->phone_number,
               'check_in' => $request->check_in,
               'check_out' => $request->check_out,
               'days' => $days,
               'price' => $days *$room->price,
               'user_id' => Auth::user()->id,
               'room_name' => $room->name,
               'hotel_name' => $hotel->name,
               // 'status' => $request->status,

            ]);

            $totalPrice= $days * $room->price;
            $price = Session::put('price', $totalPrice);
            $getprice= Session::get($price);

            return Redirect::route('hotel.pay');






            echo "you booked successfully";
         } else {

            return Redirect::route('hotel.room.details',$room ->id)->with('error','check out data should be greater than check in data');

          
         }
      } else {

         return Redirect::route('hotel.room.details',$room ->id)->with('errors','Choose data in the future , invalid check in or check out');


        
      }
   }


   public function paywithpaypal()
   {

   return view('hotel.pay');

   }


   public function success()
   {

      session::forget('price');

   return view('hotel.success');

   }




}
