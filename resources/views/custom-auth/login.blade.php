@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class='card-title'>Login </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('login.store')}}" method="post">
                        @csrf
                            <div class="mb-3">
                                <label for="email">Email or Phone Number</label>
                                <input class="form-control" type="text" name="email" id="email">
                                @error('email')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input class="form-control" type="password" name="password" id="password">
                                @error('password')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-check md-3">
                                <input class="form-check-input" name="remember" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                  Remember me
                                </label>
                              </div>
                            <button class="btn btn-success" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
