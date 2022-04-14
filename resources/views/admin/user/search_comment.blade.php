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
            <th>Name</th>
        </tr>
    </thead>
    <tbody>
            @foreach($comment_search as $item)          
            <tr> 
            <td>{{$item}}</td>   
            </tr>       
            @endforeach
    </tbody>
</table>
@endsection