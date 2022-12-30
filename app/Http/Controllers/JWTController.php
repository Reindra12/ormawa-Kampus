<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Auth;
// use Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class JWTController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Register user.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|min:2|max:100',
            'nim' => 'required|string|min:2|max:100',
            'user' => 'required|string|email|max:100|unique:mahasiswas',
            'password' => 'required|string|confirmed|min:6',
        ]);

        if($validator->fails()) {
            // return response()->json($validator->messages()->all(), 400);
            $messageError = $validator->messages()->all();
            return $this-> respondIncorretRegister($messageError);
        }

        $user = Mahasiswa::create([
                'id_mahasiswa' => $request->id_mahasiswa,
                'nama' => $request->nama,
                'user' => $request->user,
                'nim' => $request->nim,
                'password' => Hash::make($request->password)
            ]);

            $token = auth()->attempt($validator->validated());
            $responsedata = $user;
            $responsedata['token'] = $token;
        return response()->json([
            'status' => true,
            'message' => 'User successfully registered',
            'errors' => null,
            'data' => $responsedata
        ], 201);
    }

    /**
     * login user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            // return response()->json($validator->errors(), 422);
            $messageError = $validator->messages()->all();
            return $this-> respondIncorretRegister($messageError);
        }

        if (!$token = auth()->attempt($validator->validated())) {
            // return response()->json(['error' => 'Unauthorized'], 401);
            $messageError = 'No account detection';
            return $this-> respondIncorret($messageError);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Logout user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'User successfully logged out.']);
    }

    /**
     * Refresh token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get user profile.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function profile()
    {
        return response()->json(auth()->user());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        $responsedata = auth()->user();
        $responsedata['token'] = $token;
        return response()->json([
            // 'access_token' => $token,
            // 'token_type' => 'bearer',
            // 'expires_in' => auth()->factory()->getTTL() * 1,
            'status' => true,
            'message' => 'OK!',
            'errors' => null,
            'data' => $responsedata,
        ]);
    }

    protected function respondIncorretRegister($messageError){

        return response()->json([
            'status' => false,
            'message' => 'OK!',
            'errors' => $messageError[0],
            // 'errors' => 'Failed to process request'
        ],401);
    }


    protected function respondIncorret($messageError){

        return response()->json([
            'status' => false,
            'message' => 'OK!',
            'errors' => $messageError,
            // 'errors' => 'Failed to process request'
        ],401);
    }
}
