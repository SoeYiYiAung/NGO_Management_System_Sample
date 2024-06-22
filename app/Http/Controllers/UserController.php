<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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

    public function getUserInfo(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            \Log::info('User not authenticated', [
                'headers' => $request->headers->all(),
                'token' => $request->bearerToken()
            ]);
            return response()->json(['message' => 'User not authenticated'], 401);
        }

        if ($user->hasRole('super admin')) {
            $data = User::with(['staff.roles.permissions', 'staff.departments'])->get();
        } elseif ($user->hasRole('manager')) {
            $data = User::with(['staff.roles.permissions', 'staff.departments'])
                        ->whereHas('staff.departments', function ($q) use ($user) {
                            $q->whereIn('id', $user->staff->departments->pluck('id'));
                        })->get();
        } else {
            $data = User::with(['roles.permissions'])->where('id', $user->id)->first();
        }

        return response()->json($data);
    }
}
