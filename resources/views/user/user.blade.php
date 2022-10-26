@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    
</div>
<h1>Register User</h1>
 
<a href="/user/add"><button type="button" class="btn btn-success"> + Add New User</button></a>

<br/>
<br/>

<table class="table">
    <tr>
        <th>Nama</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
    @foreach($user as $u)
    <tr>
        <td>{{ $u->name }}</td>
        <td>{{ $u->email }}</td>
        <td>
            <a href="/user/edit/{{ $u->id }}"><button type="button" class="btn btn-warning" >Edit</button></a>
            <a href="/user/delete/{{ $u->id }}"><button type="button" class="btn btn-danger" >Delete</button></a>
        </td>
    </tr>
    @endforeach
</table>
{{ $user->links() }}
@endsection
