<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Booking\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function mybookings()
    {

        $bookings = Booking::select()->orderBy('id', 'desc')
            ->where('user_id', Auth::user()->id)
            ->get();

        return view('users.bookings', compact('bookings'));
    }
}
