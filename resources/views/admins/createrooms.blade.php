@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-5 d-inline">Create Rooms</h5>
                    <form method="POST" action="{{ route('store.rooms')}}" enctype="multipart/form-data">
                        @csrf
                        <!-- Email input -->
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="name" id="form2Example1" class="form-control"
                                placeholder="name" />

                        </div>
                        <div class="form-outline mb-4 mt-4">
                            <input type="file" name="image" id="form2Example1" class="form-control" />

                        </div>
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="price" id="form2Example1" class="form-control"
                                placeholder="price" />

                        </div>
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="max_persons" id="form2Example1" class="form-control"
                                placeholder="max_persons" />

                        </div>
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="num_beds" id="form2Example1" class="form-control"
                                placeholder="num_beds" />

                        </div>
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="size" id="form2Example1" class="form-control"
                                placeholder="size" />

                        </div>
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="view" id="form2Example1" class="form-control"
                                placeholder="view" />

                        </div>
                        <select class="form-control" name="hotel_id">
                            <option>Choose Hotel Name</option>

                            @foreach ($hotels as $hotel)
                                <option value="{{$hotel->id}}">{{ $hotel->name }}</option>
                            @endforeach
                        </select>
                        <br>

                        {{-- <select class="form-control">
                            <option>Choose Same Hotel Once Again</option>
                            <option>Sheraton</option>
                            <option>The Plaza Hotel</option>
                            <option>The Ritz</option>
                        </select>
                        <br> --}}

                        <!-- Submit button -->
                        <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>


                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
