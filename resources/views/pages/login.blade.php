@extends('layouts.app')
@section('content')
    <div class="mt-3 py-3">
        <form class="mx-auto col-lg-4 mt-3 py-3" action="{{ url("/login") }}" method="POST">
            @csrf
            <h1 class="text-temp-primary font-weight-light">{{ env("APP_NAME") }}</h1>
            <p class="text-muted px-1">Login page</p>
            @if(session()->has('login-message'))
            <p class="alert alert-danger alert-dimissible">
                <span class="alert-close float-right"  style="cursor:pointer" data-dismiss="alert">&times;</span>
                <span>{{ session()->get('login-message') }}</span>
            </p>
            @endif
            <div class="form-group">
                <input class="form-control {{ $errors->has('email') ? 'border border-danger' : '' }}" id="email" type="text" name="email" placeholder="Enter E-mail"/>
                @error('email')
                    <span class="text-danger small px-lg-2">E-mail Required</span>
                @enderror
            </div>
            <div class="form-group">
                <input class="form-control {{ $errors->has('password') ? 'border border-danger' : '' }}" id="password" type="password" name="password" placeholder="Enter Password" autocomplete="off"/>
                @error('password')
                    <span class="text-danger small px-lg-2">Password Required</span>
                @enderror
            </div>
            <hr/>
            <div class="form-group clearfix">
                <button class="btn btn-primary float-right">login</button>
            </div>
        </form>
    </div>
@endsection
