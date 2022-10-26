@extends('layouts.app')

@section('content')
<div class="form-group row">
    <h3 class="col-md-4">Add Barang</h3>
</div>

<form action="/barang/store" method="post">
    {{ csrf_field() }}
    <div class="form-group row">
        <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Barang Name') }}</label>

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

    <div class="form-group row">
        <label for="supplier" class="col-md-2 col-form-label text-md-right">{{ __('Supplier') }}</label>
        <div class="col-md-4">
            <select name="supplier" class="form-select" aria-label="Default select example" required>
                @foreach($supplier as $s)
                    <option value="{{ $s->id }}">{{ $s->nama_supplier }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary">
                {{ __('Add Barang') }}
            </button>
        </div>
    </div>
</form>
@endsection

