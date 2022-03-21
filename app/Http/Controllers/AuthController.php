<?php

namespace App\Http\Controllers;

use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(Request $request)
    {
    	//Validate data
        $data = $request->only('name', 'email', 'phone');
        $validator = Validator::make($data, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone' => 'required|string|unique:users'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is valid, create new user
        $user = User::create([
        	'name' => $request->name,
            'phone' => $request->phone,
            'remember_token' => Str::random(8),
            'email' => $request->email,
            'gender' => $request->gender,
            'old' => $request->old,
            'province' => $request->province,
            'city' => $request->city,
            'role' => "user",
        	'password' => bcrypt($this->password())
        ]);

        //User created, return success response
        return response()->json([
            'success' => true,
            'message' => 'User created successfully',
            'data' => $user
        ], Response::HTTP_OK);
    }
 
    public function authenticate(Request $request)
    {
        if (!$request->password) {
            $request->merge([
                'password' => $this->password(),
            ]);
        }
        $email = User::where('phone', $request->phone)->first()->email;
        $request->merge([
            'email' => $email,
        ]);
        
        $credentials = $request->only('email', 'password');

        $validator = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json([
                	'success' => false,
                	'message' => 'Login credentials are invalid.',
                ], 400);
            }
        } catch (JWTException $e) {
    	return $credentials;
            return response()->json([
                	'success' => false,
                	'message' => 'Could not create token.',
                ], 500);
        }
 	
 		User::where('email', $req->email)->update(['status' => 1]);
        return response()->json([
            'success' => true,
            'token' => $token,
        ]);
    }
 
    public function logout(Request $request)
    {      
        try {
            JWTAuth::invalidate(JWTAuth::getToken());
 
            return response()->json([
                'success' => true,
                'message' => 'User has been logged out'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, user cannot be logged out'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function postlogin(Request $req)
    {
        $login = $this->validator($req);
        if (Auth::attempt($login)) {
            if (Auth::user()->role ==  "admin") {
                User::where('email', $req->email)->update(['status' => 1]);
                return redirect()->route('dash');
            }
            Alert::error('Sorry You Cant Access This Site');
            return back();
        } else {
            Alert::error('Oopss', 'Your Email or Password is Wrong');
            return back();
        }
    }

    public function exit()
    {
        User::where('id', Auth::user()->id)->update(['status' => 0]);
        Auth::logout();
        return redirect()->route('login');
    }

    protected function validator($req){
        $this->validate($req, [
            'email' => 'required|string|min:1|max:50',
            'password' => 'required|string|min:1|max:20',
        ]);
        $login = [
            'email' => $req->email,
            'password' => $req->password
        ];
        return $login;
    }
 
    private function password(){
        $password = "toktok";
        return $password;
    }
}