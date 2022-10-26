@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    
</div>
<h1>Transaksi</h1>
 
<a href="/transaksi/add"><button type="button" class="btn btn-success"> + Add New Transaksi</button></a>
<a href="{{ route('exporttransaksi') }}"><button type="button" class="btn btn-success"> Export File </button></a>

<br/>
<br/>

<table class="table">
    <tr>
        <th>Barang</th>
        <th>Jumlah Keluar</th>
        <th>Tanggal</th>
        <th>User</th>
        <th>Supplier</th>
        <th>Action</th>
    </tr>
    @foreach($transaksi as $t)
    @php
        $barang = \DB::table('barang')->where('id', $t->id_barang)->first();
        $supplier = \DB::table('supplier')->where('id', $t->id_supplier)->first();
    @endphp
    <tr>
        <td>{{ $barang->nama_barang }}</td>
        <td>{{ $t->jumlah_keluar }}</td>
        <td>{{ date('d-m-Y', strtotime($t->tanggal)) }}</td>
        <td>{{ $t->user }}</td>
        <td>{{ $supplier->nama_supplier }}</td>
        <td>
            <a href="/transaksi/edit/{{ $t->id }}"><button type="button" class="btn btn-warning" >Edit</button></a>
            <a href="/transaksi/delete/{{ $t->id }}"><button type="button" class="btn btn-danger" >Delete</button></a>
        </td>
    </tr>
    @endforeach
</table>
{{ $transaksi->links() }}
@endsection
