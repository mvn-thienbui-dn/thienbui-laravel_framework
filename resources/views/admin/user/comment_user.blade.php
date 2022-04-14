@extends('layouts.index')
@section('title', 'List Comment')
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
@endsection