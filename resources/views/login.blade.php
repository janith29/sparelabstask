@extends('layouts.welcome')
@section('content')     
<div class="w3-display-topright w3-padding-large w3-xlarge w3-text-white">
    <a class="btn btn-success navbtn" href="/" role="button">Home</a>
</div>
  
<div class="w3-display-middle bg-text">
    <form action="login" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="email"  id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"  placeholder="{{ __('views.auth.login.input_0') }}" required autofocus>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                        <input id="password" type="password" class="form-control" name="password" placeholder="{{ __('views.auth.login.input_1') }}" required>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>  
                </div>
            </div>
            <div class="col-sm-3"></div>
    </form>
</div>   

  @endsection