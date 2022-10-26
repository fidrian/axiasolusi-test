@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    
</div>
<h1>Supplier</h1>
 
<a href="/supplier/add"><button type="button" class="btn btn-success"> + Add New Supplier</button></a>

<br/>
<br/>

<table class="table">
    <tr>
        <th>Nama Supplier</th>
        <th>User</th>
        <th>Action</th>
    </tr>
    @foreach($supplier as $s)
    <tr>
        <td>{{ $s->nama_supplier }}</td>
        <td>{{ $s->user }}</td>
        <td>
            <a href="/supplier/edit/{{ $s->id }}"><button type="button" class="btn btn-warning" >Edit</button></a>
            <a href="/supplier/delete/{{ $s->id }}"><button type="button" class="btn btn-danger" >Delete</button></a>
        </td>
    </tr>
    @endforeach
</table>
{{ $supplier->links() }}
@endsection
