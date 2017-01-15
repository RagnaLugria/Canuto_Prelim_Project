@extends('layouts.master')

@section('title')
    Profile
@endsection

@section('content')
<div class="row well">
    <div class="col-md-3 profile-pic">
        @if (Storage::disk('local')->has($user->first_name . '-' . $user->id . '.jpg'))
            <h3>User Information</h3>
                <section class="row account-edit">
                        <img src="{{ route('account.image', ['filename' => $user->first_name . '-' . $user->id . '.jpg']) }}" alt="" class="img-responsive">
                </section>
        @endif
    </div>
    <div class="col-md-9">
        <section class="row account-edit">
            <div class="col-md-6 col-md-offset-3">
                <form action="{{ route('account.save') }}" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                                <label for="username" class="cols-sm-2 control-label">Username</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="username" id="username"  placeholder="Enter your Username"/>
                                    </div>
                                </div>
                            </div>
                    <div class="email">
                        <label for="email">E-Mail</label>
                        <input type="text" name="email" class="form-control" value="{{ $user->email }}" id="email">
                    </div>
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}" id="first_name">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" class="form-control" value="{{ $user->last_name }}" id="last_name">
                    </div>
                    <div class="form-group">
                        <label for="Phone">Phone Number</label>
                        <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" id="phone">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" name="password" class="form-control" id="password">
                    </div>
                    <div class="form-group">
                        <label for="image">Image (only .jpg)</label>
                        <input type="file" name="image" class="form-control" id="image">
                    </div>
                    <button type="submit" class="btn btn-primary">Save Account</button>
                    <input type="hidden" value="{{ Session::token() }}" name="_token">
                </form>
            </div>
        </section> 
    </div>
@endsection
</div>