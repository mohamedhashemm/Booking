@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-5 d-inline">Update Hotel</h5>
                    <form method="POST" action="{{ route('hotel.update', $hotel->id) }}" enctype="multipart/form-data">
                        <!-- Email input -->
                        @csrf
                        @method('post')
                        <div class="form-outline mb-4 mt-4">
                            @if ($errors->has('name'))
                                <p class="alert alert-success">{{ $errors->first('name') }}</p>
                            @endif
                            <input type="text" name="name" value="{{ $hotel->name }}" id="form2Example1"
                                class="form-control" placeholder="name" />

                        </div>
                        <div class="form-group">
                            @if ($errors->has('description'))
                                <p class="alert alert-success">{{ $errors->first('description') }}</p>
                            @endif
                            <label for="exampleFormControlTextarea1">Description</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{ $hotel->description }}"</textarea>
                        </div>

                        <div class="form-outline mb-4 mt-4">
                            @if ($errors->has('location'))
                                <p class="alert alert-success">{{ $errors->first('location') }}</p>
                            @endif
                            <label for="exampleFormControlTextarea1">Location</label>

                            <input type="text" value="{{ $hotel->location }}" name="location" id="form2Example1"
                                class="form-control" />

                        </div>


                        <!-- Submit button -->
                        <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">update</button>


                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
