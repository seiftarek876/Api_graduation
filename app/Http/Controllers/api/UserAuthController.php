<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UserAuthController extends Controller
{
    public function signUp(Request $request)
    {
        $request->validate([
            'user_name' => 'required',
            'user_email' => 'required|email|unique:users,user_email',
            'user_password' => 'required',
            'user_phone'=>'unique:users,user_phone'
        ]);
        try {
            $user = User::create([
                'user_name' => $request->user_name,
                'user_email' => $request->user_email,
                'user_password' => Hash::make($request->user_passowrd),
                'user_phone'=>$request->user_phone,
                'qr_code'=>Str::random(64)
            ]);
            return response()->json([
                'status' => 'user created',
                'token' => $user->createToken('user_token')->plainTextToken,
                'name' => $user->user_name,
                'phone' =>$user->user_phone,
                'qr_code'=>$user->qr_code,
                'email'=>$user->user_email,
            ]);
        } catch (\Exception $exception) {
            Log::info($exception->getMessage());
            return response()->json([
                'status' => 'Failed',
                'error' => $exception->getMessage()
            ], 500);
        }
    }
    public function signIn(Request $request)
    {
        $request->validate([
            'user_email' => 'exists:users,user_email',
            'qr_code'=>'exists:users,qr_code',
        ]);
        try {
            $user = User::Where('user_email' , $request->user_email)->first();
            $qr_code = User::Where('qr_code' , $request->qr_code)->first();
            if (Hash::check($request->password, $user->user_password)) {
                $user->tokens()->delete();
                return response()->json([
                    'name' => $user->user_name,
                    'phone' =>$user->user_phone,
                    'qr_code'=>$user->qr_code,
                    'email'=>$user->user_email,
                    'token' => $user->createToken('user_token')->plainTextToken,
                ]);
            } elseif($request->qr_code == $qr_code->qr_code) {
                $qr_code->tokens()->delete();
                return response()->json([
                    'user_name'=>$qr_code->user_name,
                    'token'=> $qr_code->createToken('user_token')->plainTextToken
                ]);
            }else {
                return response()->json([
                    'status' => 'Invalid Email or password',
                ], 500);
            }
        } catch (\Exception $exception) {
            Log::info($exception->getMessage());
            return response()->json([
                'status' => 'Failed',
            ], 500);
        }
    }
    public function show(){
        return response()->json([
            'status' => 'Data Returned',
           'data' => User::all()->toArray(),
        ]);
        ;
    }
    public function update(Request $request, string $id){
        $request->validate([
            'user_name'=>'string|min:5',
            'user_email'=>['email',Rule::unique('users','user_email')->ignore($id)],
            'user_phone'=>'min:11',
        ]);
        try {
            User::find($id)->update($request->except('_token'));
            return response()->json([
                'status'=>'user updated',
                'user'=> User::find($id)
            ]);
        } catch (\Exception $exception) {
            Log::info($exception->getMessage());
            return response()->json([
                'status' => 'Failed',
            ], 500);
        }
    }

}
