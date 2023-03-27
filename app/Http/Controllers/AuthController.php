<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function login(AuthRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken($request->device_name)->plainTextToken;

        // Store user information and token in local storage
        $userData = [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'token' => $token
        ];

        // Encode user data as JSON
        $userDataJson = json_encode($userData);

        // Save user data to local storage
        Storage::put('user.json', $userDataJson);

        return response()->json($userData);

    }

    public function register(AuthRequest $request)
    {
        if (!$request) {
            return response()->json(['errors' => $request->errors()], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return $user->createToken($request->device_name)->plainTextToken;
    }
}
