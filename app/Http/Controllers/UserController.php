<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json([
            'message' => 'success',
            'data' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi
        $userValidated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'noTelp' => 'nullable',
            'alamat' => 'nullable',
            'img' => 'nullable'
        ]
    );

        //fileupload
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storePubliclyAs('user', $filename, 'public');
            $userValidated['img'] = 'user/' . $filename;
        }

        $user = User::create([
            'name' => $userValidated['name'],
            'email' => $userValidated['email'],
            'password' => bcrypt($userValidated['password']),
            'noTelp' => $userValidated['noTelp'],
            'alamat' => $userValidated['alamat'],
            'img' => $userValidated['img']
        ]);
        
        return response()->json([
            'message' => 'success',
            'data' => $user
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //

        return response()->json([
            'message' => 'success',
            'data' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //

        $userValidated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'noTelp' => 'nullable',
            'alamat' => 'nullable',
            'img' => 'nullable'
        ]);

        //fileupload
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storePubliclyAs('user', $filename, 'public');
            $userValidated['img'] = 'user/' . $filename;

            //hapus file lama
            if ($user->img) {
                Storage::delete('public/' . $user->img);
            }
        }

        $user->update([
            'name' => $userValidated['name'],
            'email' => $userValidated['email'],
            'noTelp' => $userValidated['noTelp'],
            'alamat' => $userValidated['alamat'],
            'img' => $userValidated['img']
        ]);

        return response()->json([
            'message' => 'success',
            'data' => $user
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //

        $user->delete();

        return response()->json([
            'message' => 'success',
            'data' => $user
        ]);
    }
}
