@extends('layouts.app')

@section('content')
<div class="form-group row">
    <h3 class="col-md-4">Add User</h3>
</div>
 
<a href="/user"><button type="button" class="btn btn-warning">Go Back</button></a>

<br/>
<br/>

<form action="/user/store" method="post">
    {{ csrf_field() }}
    <div class="form-group row">
        <label for="name" class="col-md-1 col-form-label text-md-right">{{ __('Name') }}</label>

        <div class="col-md-4">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-md-1 col-form-label text-md-right">{{ __('Email') }}</label>

        <div class="col-md-4">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="password" class="col-md-1 col-form-label text-md-right">{{ __('Password') }}</label>

        <div class="col-md-4">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row mb-0">
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary">
                {{ __('Add User') }}
            </button>
        </div>
    </div>
</form>
@endsection

