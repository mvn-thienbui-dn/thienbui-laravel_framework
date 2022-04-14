<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Profile;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $listuser = User::orderBy('id', 'ASC')->paginate(5);
        
        return view('/admin/user/list',compact('listuser'));
    }
    public function sort_name()
    {
        $listuser = User::orderBy('name', 'ASC')->paginate(5);
        return view('/admin/user/sort_name',compact('listuser'));
    }
    public function sort_age()
    {
        $listuser = User::orderBy('age', 'ASC')->paginate(5);
        return view('/admin/user/sort_age',compact('listuser'));
    }
    public function show_comment($id)
    {
        $listComment = User::find($id)->comments;
        // dd($listComment);
        return view('/admin/user/comment_user',compact('listComment'));
    }
    public function show_post($id)
    {
        $listPost = User::find($id)->posts;
        return view('/admin/user/post_user',compact('listPost'));
    }
    public function info_user($id)
    {
        $listComment = User::find($id)->comments;
        $listPost = User::find($id)->posts;
        $listProfile = User::find($id)->profiles;
        // dd($listComment);
        return view('/admin/user/info_user',compact('listComment', 'listPost','listProfile'));
    }
    public function search(){
        $search_name =$_GET['search'];
        $user_search = User::where('name', 'LIKE', '%'.$search_name.'%')->get();
        return view('/admin/user/search',compact('user_search'));
    }
    public function search_comment(){
        $search_name = $_GET['searchComment'];
        $users = User::with('comments')->get();
        // dd($users);
        $data = array();
        foreach ($users as $user) {
            $userName = $user->name;
            $counts = count(($user->comments)); 
            $data[$userName] = $counts;
        }
        $comment_search = array_keys($data, $search_name);
        return view('/admin/user/search_comment', compact('comment_search'));
    }
    public function search_post(){
        $search_name = $_GET['searchPost'];
        $users = User::with('posts')->get();
        // dd($users);
        $data = array();
        foreach ($users as $user) {
            $userName = $user->name;
            $counts = count(($user->posts)); 
            $data[$userName] = $counts;
        }
        $post_search = array_keys($data, $search_name);
        return view('/admin/user/search_post', compact('post_search'));
    } 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/user/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::insert(request(['name', 'age', 'email', 'password', 'birthday', 'status']));
        return redirect()->to('/admin/user/list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
