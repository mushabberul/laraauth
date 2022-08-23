@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title pt-2">Registation Form</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{Route('register.store')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input class="form-control" type="text" name="name" id="name">
                                @error('name')
                                    <span class='text-danger'>{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input class="form-control" type="email" name="email" id="email">
                                @error('email')
                                    <span class='text-danger'>{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="univercity">Univercity</label>
                                <input class="form-control" type="text" name="univercity" id="univercity">
                                @error('univercity')
                                    <span class='text-danger'>{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="phone">Phone</label>
                                <input class="form-control" type="text" name="phone" id="phone">
                                @error('phone')
                                    <span class='text-danger'>{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input class="form-control" type="password" name="password" id="password">
                                @error('password')
                                    <span class='text-danger'>{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="confirm_password">Confirm Password</label>
                                <input class="form-control" type="password" name="password_confirmation" id="confirm_password">
                                @error('password_confirmation')
                                    <span class='text-danger'>{{$message}}</span>
                                @enderror
                            </div>
                                <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
