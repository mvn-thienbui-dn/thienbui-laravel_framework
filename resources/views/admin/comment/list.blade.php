@extends('layouts.index')
@section('title', 'List Comment')
@section('content')
   <h2>List Comment</h2>
   <table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Comment</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($listcomment as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->content}}</td>
            <td>
                <a href="{{route('user.show', ['id' => $item ->id])}}">Show</a>
                <button>Delete</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection