<?php
namespace App\Http\Repository;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class UserRepository
    {
    public function register(Request $request)
    {
        try {

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'message' => 'User created successfully',
            'user' => $user
        ]);
    }
        catch (Exception $error) {
            return response()->json([
                'error'=>$error->getMessage(),
                'message'=>'User is not created , check the form fields'
            ]);
    }
}
    public function login(Request $request)
    {
        try {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

            $credentials = $request->only('email', 'password');
            $token = Auth::attempt($credentials);

            if (!$token) {
                return response()->json([
                    'message' => 'Unauthorized , verify your credentials',
                ], 401);
            }
            return response()->json([
                'user' => Auth::user()->name,
                'message'=>'You are logged!',
                'authorization' => [
                    'token' => $token,
                    'type' => 'bearer',
                    'expires_in' => auth('api')->factory()->getTTL() * 60
                ]
            ]);
    }
        catch (Exception $error) {
            return response()->json([
                'error'=>$error->getMessage(),
                'message'=>'Error , verify your credentials',

            ]);
    }
}

    public function logoff ()
    {
        Auth::logout();
        return response()->json([
            'message' => 'Logoff success ',
        ]);
    }

    public function refreshToken()
    {
        return response()->json([
            'user' => Auth::user()->name,
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }
}
