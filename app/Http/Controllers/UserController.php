<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Transformer\Transformer;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usersRaw = User::paginate(15);

        $transformer = new Transformer();
        $users = $transformer->sendCollectionToTransformer($usersRaw, new \App\Transformer\UserTransformer);

        return response()->json(['success' => true, 'users' => $users]);
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
        $user = new User;
        $user->username = $request->username;
        $user->name = $request->name;
        $user->slug = $request->slug;
        $user->bio = $request->bio;
        $user->email = $request->email;
        $user->password = bcrypt($request->username);
        $user->save();
        return response()->json(['success' => true, 'user' => $user]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $userRaw = User::where('slug', $slug)->first();

        $transformer = new Transformer();
        $user = $transformer->sendItemToTransformer($userRaw, new \App\Transformer\UserTransformer);

        return response()->json(['success' => true, 'user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $user->update($request->all());

        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return response()->json(['success' => true]);
    }
}
