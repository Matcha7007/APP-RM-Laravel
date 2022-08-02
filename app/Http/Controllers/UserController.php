<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('components.user.index', [
            'title' => 'User Management',
            'users' => User::with('role')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('components.user.create', [
            'title' => 'Tambah User Baru',
            'roles' => Role::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users|min:5|max:16',
            'email' => 'required|unique:users|email:dns',
            'password' => 'required',
            'role_id' => 'required'
        ]);

        $requestData['password'] = Hash::make($requestData['password']);
        User::create($requestData);

        return redirect('/master/user')->with('success', 'User baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('components.user.show', [
            'user' => $user,
            'title' => 'User Detail'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // dd($user);
        return view('components.user.edit', [
            'title' => 'Edit User',
            'roles' => Role::all(),
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required',
            'role_id' => 'required'
        ];
        if($request->username != $user->username){
            $rules['username'] = 'required|unique:users|min:5|max:16';
        }
        if($request->email != $user->email){
            $rules['email'] = 'required|unique:users|email:dns';
        }

        $requestData = $request->validate($rules);

        // if($request->password !== ''){
        //     $requestData['password'] = Hash::make($requestData['password']);
        // }
        User::where('id', $user->id)
            ->update($requestData);

        return redirect('/master/user')->with('success', 'Data user berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('/master/user')->with('success', 'Data user sudah dihapus!');
    }
}
