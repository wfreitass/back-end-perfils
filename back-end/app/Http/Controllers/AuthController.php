<?php

namespace App\Http\Controllers;

use App\DTOs\ApiResponseDTO;
use App\Http\Resources\AuthCollection;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Throwable;

class AuthController extends Controller
{
    public function createUser(Request $request): JsonResponse
    {
        // dd(User::all());
        try {
            $validateUser = Validator::make(
                $request->all(),
                [
                    'name' => 'required',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required',
                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors(),
                ], 401);
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);


            return response()->json([
                'status' => true,
                'message' => 'User Created Successfully',
                'token' => $user->createToken('API TOKEN')->accessToken,
            ], 200);
        } catch (Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function loginUser(Request $request): JsonResponse
    {
        try {
            $validateUser = Validator::make(
                $request->all(),
                [
                    'email' => 'required|email',
                    'password' => 'required',
                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors(),
                ], 401);
            }

            if (! Auth::attempt($request->only(['email', 'password']))) {
                return response()->json([
                    'status' => false,
                    'message' => 'Email & Password does not match with our record.',
                ], 401);
            }
            $user = User::where('email', $request->email)->first();

            return ApiResponseDTO::success(200, data: new AuthCollection(
                [
                    'user' => $user,
                    'token' => $user->createToken('API_TOKEN')->accessToken,
                ]
            ))->toJson();
        } catch (Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function user(Request $request)
    {
        return new AuthCollection(
            [$request->user()],
        );
        return ApiResponseDTO::success(200, data: new AuthCollection(
            [$request->user()],
        ))->toJson();
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            'message' => 'logged out',
        ]);
    }
}
