@extends('layouts.index')
@section('title', 'Sort By Age')
@section('content')
   <h2>Sort By Age</h2>
   <form type="get" action="{{route('search')}}">
       <input type="search" name="search" placeholder="Search">
       <button type="submit">Search</button>
   </form>
   <a href="{{route('create')}}">Add User</a>
   <table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Email</th>
            <th>Create at</th>
            <th>Total Post</th>
            <th>Total Comment</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($listuser as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td><a href="{{route('post.show', ['id' => $item ->id])}}">{{$item->name}}</a></td>
            <td>{{$item->age}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->created_at}}</td>
            <td><a href="{{route('post.show', ['id' => $item ->id])}}">{{$item->posts->count()}}</a></td>
            <td><a href="{{route('comment.show', ['id' => $item ->id])}}">{{$item->comments->count()}}</a></td>
            <td>
                <a href="{{route('comment.show', ['id' => $item ->id])}}">Show comment</a>
                <a href="{{route('comment.info.user', ['id' => $item ->id])}}">Show</a>
                <button>Delete</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<hr>
<div>{{$listuser->appends(request()->all())->links()}}</div>
@endsection