@extends('layouts.index')
@section('title', 'List Create user')
@section('content')
<h2>Add User</h2>
    <form method="POST" action="{{route('store')}}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>

        <div class="form-group">
            <label for="age">Age:</label>
            <input type="number" class="form-control" id="age" name="age">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="form-group">
            <label for="birthday">Birthday:</label>
            <input type="date" class="form-control" id="birthday" name="birthday">
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" id="status">
               <option value="1">Hide</option>
               <option value="2">Dislay</option>
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        
    </form>
@endsection