@extends('layouts.index')
@section('title', 'List User')
@section('content')
<!-- Modal -->
<div class="modal fade" id="AddUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <ul id="saveform_errList"></ul>
        <div class="form-group mb-3">
            <label for="">Name</label>
            <input type="text" class="name form-control">
        </div>
        <div class="form-group mb-3">
            <label for="">Age</label>
            <input type="number" class="age form-control">
        </div>
        <div class="form-group mb-3">
            <label for="">Birthday</label>
            <input type="date" class="birthday form-control">
        </div>
        <div class="form-group mb-3">
            <label for="">Email</label>
            <input type="email" class="email form-control">
        </div>
        <div class="form-group mb-3">
            <label for="">Password</label>
            <input type="password" class="password form-control">
        </div>
        <div class="form-group mb-3">
            <label for="">Status</label>
            <select name="status" class="status form-control" id="status">
               <option value="1">Hide</option>
               <option value="2">Dislay</option>
            </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary add_user">Save</button>
      </div>
    </div>
  </div>
</div>
<!-- Edit Modal -->
<div class="modal fade" id="EditUserModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul id="updateform_errList">
            
        </ul>
        <input type="hidden" id="edit_user_id">
        <div class="form-group mb-3">
            <label for="">Name</label>
            <input type="text" id="edit_name" class="name form-control">
        </div>
        <div class="form-group mb-3">
            <label for="">Age</label>
            <input type="number" id="edit_age" class="age form-control">
        </div>
        <div class="form-group mb-3">
            <label for="">Birthday</label>
            <input type="date" id="edit_birthday" class="birthday form-control">
        </div>
        <div class="form-group mb-3">
            <label for="">Email</label>
            <input type="email" id="edit_email" class="email form-control">
        </div>
        <div class="form-group mb-3">
            <label for="">Password</label>
            <input type="password" id="edit_password" class="password form-control">
        </div>
        <div class="form-group mb-3">
            <label for="">Status</label>
            <select name="status" id="edit_status" class="status form-control" id="status">
               <option value="1">Hide</option>
               <option value="2">Dislay</option>
            </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary update_user">Update</button>
      </div>
    </div>
  </div>
</div>
<!-- Delete Modal -->
<div class="modal fade" id="DeleteUserModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <input type="text" id="delete_user_id">
      <h4>Are you sure you want to delete?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary delete_user_modal">Yes</button>
      </div>
    </div>
  </div>
</div>
   <h2>List User</h2>
   <form type="get" action="{{route('search')}}">
       <input type="search" name="search" placeholder="Search name">
       <button type="submit">Search name</button>
   </form>
   <form type="get" action="{{route('search.comment')}}">
       <input type="search" name="searchComment" placeholder="Search comments">
       <button type="submit">Search comments</button>
   </form>
   <form type="get" action="{{route('search.post')}}">
       <input type="search" name="searchPost" placeholder="Search posts">
       <button type="submit">Search posts</button>
   </form>
   <a href="#" data-toggle="modal" data-target="#AddUserModal" class="btn btn-primary float-end btn-sm">Add User API</a>
   <a href="{{route('create')}}" class="btn btn-primary btn-sm">Add User</a>
   <a href="{{route('sort.name')}}" class="btn btn-primary btn-sm">Sort Name</a>
   <a href="{{route('sort.age')}}" class="btn btn-primary btn-sm">Sort Age</a>
   <div id="success_message">

   </div>
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
    @foreach($listuser as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td><a href="{{route('post.show', ['id' => $item ->id])}}">{{$item->name}}</a></td>
            <td>{{$item->email}}</td>
            <td>{{$item->created_at}}</td>
            <td><a href="{{route('post.show', ['id' => $item ->id])}}">{{$item->posts->count()}}</a></td>
            <td><a href="{{route('comment.show', ['id' => $item ->id])}}">{{$item->comments->count()}}</a></td>
            <td>
                <a href="{{route('comment.show', ['id' => $item ->id])}}" class="btn btn-primary btn-sm">Show comment</a>
                <a href="{{route('comment.info.user', ['id' => $item ->id])}}" class="btn btn-primary btn-sm">Show</a>
                <button type="button" value="{{$item->id}}" class="edit_user btn btn-primary btn-sm">Edit</button>
                <button type="button" value="{{$item->id}}" class="delete_user btn btn-primary btn-sm">Delete</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<hr>
<div>{{$listuser->appends(request()->all())->links()}}</div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        $(document).on('click','.add_user',function(e){
            e.preventDefault();
            var data = {
                'name':$('.name').val(),
                'age':$('.age').val(),
                'birthday':$('.birthday').val(),
                'email':$('.email').val(),
                'password':$('.password').val(),
                'status':$('.status').val()
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:"POST",
                url:"/api/user/create",
                data: data,
                dataType:"json",
                success: function (response){
                    //console.log(response);
                    if(response.status == 400){
                        $('#saveform_errList').html("");
                        $('#saveform_errList').addClass('alert alert-danger');
                        $.each(response.errors, function(key, err_values){
                            $('#saveform_errList').append('<li>'+err_values+'</li>');
                        });
                        window.location.reload();
                    }else{
                        $('#saveform_errList').html("");
                        $('#saveform_errList').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#AddUserModal').modal('hide');
                        $('#AddUserModal').find("input").val("");
                        window.location.reload();
                    }
                }
            });
        });
        $(document).on('click','.edit_user',function(e){
            e.preventDefault();
            var user_id = $(this).val();
            $('#EditUserModel').modal('show');
            $.ajax({
                type:"GET",
                url:"/api/edit/"+user_id,
                success: function (response){
                    if(response.status == 404){
                        $('#saveform_errList').html("");
                        $('#saveform_errList').addClass('alert alert-danger');
                        $('#success_message').text(response.message);
                    }else{
                        $('#edit_name').val(response.user.name);
                        $('#edit_age').val(response.user.age);
                        $('#edit_birthday').val(response.user.birthday);
                        $('#edit_email').val(response.user.email);
                        $('#edit_password').val(response.user.password);
                        $('#edit_status').val(response.user.status);
                        $('#edit_user_id').val(user_id);
                    }
                }
            });
        });
        $(document).on('click','.update_user',function(e){
            e.preventDefault();
            var user_id = $('#edit_user_id').val();
            var data = {
                'name':$('#edit_name').val(),
                'age':$('#edit_age').val(),
                'birthday':$('#edit_birthday').val(),
                'email':$('#edit_email').val(),
                'password':$('#edit_password').val(),
                'status':$('#edit_status').val()
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:"PUT",
                url:"/api/update/"+user_id,
                data: data,
                dataType:"json",
                success: function (response){
                    if(response.status == 400){
                        $('#updateform_errList').html("");
                        $('#updateform_errList').addClass('alert alert-danger');
                        $.each(response.errors, function(key, err_values){
                            $('#updateform_errList').append('<li>'+err_values+'</li>');
                        });
                        window.location.reload();
                    }else if(response.status == 404){
                        $('#updateform_errList').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                    }else{
                        $('#updateform_errList').html("");
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#EditUserModel').modal('hide');
                        window.location.reload();
                    }
                }
            });
        });
        $(document).on('click','.delete_user',function(e){
            e.preventDefault();
            var user_id = $(this).val();
            $('#delete_user_id').val(user_id);
            $('#DeleteUserModel').modal('show');
        });
        $(document).on('click','.delete_user_modal',function(e){
            e.preventDefault();
            var user_id = $('#delete_user_id').val();
            console.log(user_id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:"DELETE",
                url:"/api/delete/"+user_id,
                success: function (response){
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                    $('#DeleteUserModel').modal('hide');
                    window.location.reload();
                }
            });
        });
    });
</script>
@endsection