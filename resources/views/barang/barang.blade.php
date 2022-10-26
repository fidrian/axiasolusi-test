@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    
</div>
<h1>Barang</h1>
 
<a href="/barang/add"><button type="button" class="btn btn-success"> + Add New Barang</button></a>

<br/>
<br/>

<table class="table">
    <tr>
        <th>Nama Barang</th>
        <th>User</th>
        <th>Supplier</th>
        <th>Action</th>
    </tr>
    @foreach($barang as $b)
    @php
        $supplier = \DB::table('supplier')->where('id', $b->id_supplier)->first();
    @endphp
    <tr>
        <td>{{ $b->nama_barang }}</td>
        <td>{{ $b->user }}</td>
        <td>{{ $supplier->nama_supplier }}</td>
        <td>
            <a href="/barang/edit/{{ $b->id }}"><button type="button" class="btn btn-warning" >Edit</button></a>
            <a href="/barang/delete/{{ $b->id }}"><button type="button" class="btn btn-danger" >Delete</button></a>
        </td>
    </tr>
    @endforeach
</table>
{{ $barang->links() }}
@endsection
