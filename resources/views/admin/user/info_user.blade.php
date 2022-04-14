@extends('layouts.index')
@section('title', 'List Info User')
@section('content')
   <h2>List Comment User</h2>
   <table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Comment</th>
        </tr>
    </thead>
    <tbody>
    @foreach($listComment as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->content}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<h2>List Info User</h2>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>content</th>
        </tr>
    </thead>
    <tbody>
    @foreach($listPost as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->content}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<h2>List Profile User</h2>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Address</th>
            <th>Tel</th>
            <th>Province</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$listProfile->id}}</td>
            <td>{{$listProfile->address}}</td>
            <td>{{$listProfile->tel}}</td>
            <td>{{$listProfile->province}}</td>
        </tr>
    </tbody>
</table>
@endsection