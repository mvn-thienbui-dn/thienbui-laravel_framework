@extends('layouts.index')
@section('title', 'Search User')
@section('content')
   <h2>List Search</h2>
   <form type="get" action="{{route('search')}}">
       <input type="search" name="search" placeholder="Search">
       <button type="submit">Search</button>
   </form>
   <a href="{{route('create')}}">Add User</a>
   <a href="{{route('sort.name')}}">Add User</a>
   <table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Create at</th>
            <th>Total Post</th>
            <th>Total Comment</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($user_search as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td><a href="{{route('post.show', ['id' => $item ->id])}}">{{$item->name}}</a></td>
            <td>{{$item->email}}</td>
            <td>{{$item->created_at}}</td>
            <td>{{$item->posts->count()}}</td>
            <td>{{$item->comments->count()}}</td>
            <td>
                <a href="{{route('comment.show', ['id' => $item ->id])}}">Show comment</a>
                <a href="{{route('comment.info.user', ['id' => $item ->id])}}">Show</a>
                <button>Delete</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection