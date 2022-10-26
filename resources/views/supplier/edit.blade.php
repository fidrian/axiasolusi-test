@extends('layouts.app')

@section('content')
<div class="form-group row">
    <h3 class="col-md-4">Edit Supplier</h3>
</div>

@foreach($supplier as $s)
<form action="/supplier/update" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{ $s->id }}"> <br/>

    <div class="form-group row">
        <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Supplier Name') }}</label>

        <div class="col-md-4">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required value="{{ $s->nama_supplier }}">

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="user" class="col-md-2 col-form-label text-md-right">{{ __('User') }}</label>

        <div class="col-md-4">
            <input id="user" type="user" class="form-control @error('user') is-invalid @enderror" name="user" disabled value="{{ Auth::user()->email }}">

            @error('user')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row mb-0">
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary">
                {{ __('Edit Supplier') }}
            </button>
        </div>
    </div>
</form>
@endforeach
@endsection


