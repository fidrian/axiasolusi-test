@extends('layouts.app')

@section('content')
<div class="form-group row">
    <h3 class="col-md-4">Edit Barang</h3>
</div>

@foreach($transaksi as $t)
<form action="/transaksi/update" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{ $t->id }}"> <br/>

    <div class="form-group row">
        <label for="barang" class="col-md-2 col-form-label text-md-right">{{ __('Supplier') }}</label>
        <div class="col-md-4">
            <select name="barang" id="barang" class="form-select" onChange="updateBarang()" aria-label="Default select example" required>
                @foreach($barang as $b)
                    <option {{ $b->id == $t->id_barang ? "selected" : ""}} value="{{ $b->id }}">{{ $b->nama_barang }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="jumlah" class="col-md-2 col-form-label text-md-right">{{ __('Barang Keluar') }}</label>

        <div class="col-md-4">
            <input id="jumlah" type="number" min="0" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah" required autocomplete="jumlah" autofocus value="{{ $t->jumlah_keluar }}">
        </div>
    </div>

    <div class="form-group row">
        <label for="tanggal" class="col-md-2 col-form-label text-md-right">{{ __('Tanggal') }}</label>

        <div class="col-md-4">
            <input id="tanggal" type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" required autocomplete="tanggal" autofocus value="{{ date('Y-m-d',strtotime($t->tanggal)) }}">
        </div>
    </div>

    <div class="form-group row">
        <label for="user" class="col-md-2 col-form-label text-md-right">{{ __('User') }}</label>

        <div class="col-md-4">
            <input id="user" type="user" class="form-control @error('user') is-invalid @enderror" name="user" disabled value="{{ $t->user }}">

            @error('user')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        @php
            $supplier = \DB::table('supplier')->where('id',$t->id_supplier)->first();
        @endphp
        <label for="supplier" class="col-md-2 col-form-label text-md-right">{{ __('Supplier') }}</label>
        <div class="col-md-4">
            <input id="supplier" type="supplier" class="form-control @error('supplier') is-invalid @enderror" name="supplier" value="{{ $supplier->nama_supplier }}" disabled>
            <input type="hidden" name="supplier_id" id="supplier_id" class="form-control">
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary">
                {{ __('Edit Barang') }}
            </button>
        </div>
    </div>
</form>
@endforeach

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
function updateBarang() {
    var brg = $("#barang").val();
    
    $.ajax({
        // API GET DATA
        url: "../../api/getbrg/" + brg,
        type: 'GET',
    }).done( 
    function(data) {
        gb = JSON.parse(data);
        document.getElementById("user").value = gb.user;
        document.getElementById("supplier").value = gb.nama_supplier;
        document.getElementById("supplier_id").value = gb.id_supplier;
    });
}

</script>
@endsection


