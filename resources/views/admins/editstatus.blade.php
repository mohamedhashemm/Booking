@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-5 d-inline">Update Status</h5>
                    <p>Current Status: <b>{{ $booking->status }}</b> </p>
                    <form method="POST" action="{{route('booking.update.status',$booking->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                      
                        <!-- Email input -->
                        <select class="form-control" name="hotel_id">
                            <option>Choose Status</option>
                            <option value='processing'>processing</option>
                            <option value='Booked successfully'>Booked successfully</option>

                        </select>
                        <br>


                        <!-- Submit button -->
                        <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">update</button>


                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
