<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=> 'required|max:191',
            'age'=> 'required|max:191',
            'birthday'=> 'required|max:191',
            'email'=> 'required|email|max:191',
            'password'=> 'required|max:191',
            'status'=> 'required|max:191',
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }else{
            $user = new User();
            $user -> name = $request -> input('name');
            $user -> age = $request -> input('age');
            $user -> birthday = $request -> input('birthday');
            $user -> email = $request -> input('email');
            $user -> password = $request -> input('password');
            $user -> status = $request -> input('status');
            $user->save();
            return response()->json([
                'status'=>200,
                'message'=>'success',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return new UserResource($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        if($user){
            return response()->json([
                'status'=>200,
                'user'=>$user,
            ]);
        }else{
            return response()->json([
                'status'=>404,
                'message'=>'Not Found',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $validator = Validator::make($request->all(), [
            'name'=> 'required|max:191',
            'age'=> 'required|max:191',
            'birthday'=> 'required|max:191',
            'email'=> 'required|email|max:191',
            'password'=> 'required|max:191',
            'status'=> 'required|max:191',
        ]);
        
        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }else{
            if($user){
                
                $user -> name = $request -> input('name');
                $user -> age = $request -> input('age');
                $user -> birthday = $request -> input('birthday');
                $user -> email = $request -> input('email');
                $user -> password = $request -> input('password');
                $user -> status = $request -> input('status');
                $user->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'success',
                ]);
            }else{
                return response()->json([
                    'status'=>404,
                    'message'=>'Not Found',
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json([
            'status'=>200,
            'message'=>'success',
        ]);
    }
}
