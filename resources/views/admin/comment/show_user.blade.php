@extends('layouts.index')
@section('title', 'Show User Flow Comment')
@section('content')
   <h2>Show User Flow Comment</h2>
   <table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Create at</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$showUser->id}}</td>
            <td>{{$showUser->name}}</td>
            <td>{{$showUser->email}}</td>
            <td>{{$showUser->created_at}}</td>
        </tr>
    </tbody>
</table>
@endsection