@extends('layouts.index')
@section('title', 'List Post')
@section('content')
   <h2>List Post User</h2>
   <table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Content</th>
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
@endsection