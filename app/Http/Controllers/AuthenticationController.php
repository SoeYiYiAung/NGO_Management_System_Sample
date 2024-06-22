<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function register(Request $request)
    {
        // return $request;
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::create([
            'staff_id' => $request->staff_id,
            'name' => $request->name,
            'email' => $request->email,
            'created_by' => $request->created_by,
            'updated_by' => $request->updated_by,
            'flag' => $request->flag,
            'password' => Hash::make($request->password),
        ]);

        // return $user;

        return response()->json(['message' => 'User registered successfully'], 200);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('Personal Access Token');

        return response()->json([
            'token' => $token->plainTextToken,
            'token_type' => 'Bearer',
            'expires_at' => null 
        ]);
    }
    
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Logged out successfully']);
    }
}
