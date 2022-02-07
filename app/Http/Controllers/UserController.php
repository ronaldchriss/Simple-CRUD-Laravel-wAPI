<?php

namespace App\Http\Controllers;

use App\Models\User;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{

    public function user(User $user)
    {
        return view('menu.user.user',['user' => $user::get()]);
    }

    protected function create(Request $req)
    {
        $code = "";
        $status = "create";
        $validator = $this->validator($req);
        if ($validator->fails()) {
            Alert::error('User already Register', 'Try with other name or email');
            return back();
        }else{
            $user = $this->make($req, $status, $code);
            if ($user == 'error') {
                toast('Error', 'error', 'bottom-right');
                return back();
            }
            toast('Successfull User Register', 'success', 'bottom-right');
            return back();
        }
    }

    protected function update(Request $req, $code)
    {
        $status = "update";
        $user = $this->make($req, $status, $code);
        if ($user == 'error') {
            toast('Error', 'error', 'bottom-right');
            return back();
        }
        toast('Successfull User Update', 'success', 'bottom-right');
        return back();
    }

    public function delete($code)
    {
        User::where('id', $code)->delete();
        toast('User already delete', 'success');
        return back();
    }

    protected function validator($req){
        $validator = Validator::make(
            $req->all(),
            array(
                "name" => "unique:users,name",
                "email" => "unique:users,email"
            )
        );
        return $validator;
    }

    protected function make($req, $status, $code){
        if (!$req->roles) {
            $req->merge([
                'roles' => "admin",
            ]);
        }
        if (!$code) {
            $user = User::$status([
                'name' => $req->name,
                'phone' => $req->phone,
                'password' => bcrypt($req->input('password')),
                'remember_token' => Str::random(8),
                'email' => $req->email,
                'gender' => $req->gender,
                'old' => $req->old,
                'province' => $req->province,
                'city' => $req->city,
                'role' => $req->roles
            ]);
        }else{
            $user = User::where('id',$code)->$status([
                'name' => $req->name,
                'phone' => $req->phone,
                'email' => $req->email,
                'gender' => $req->gender,
                'old' => $req->old,
                'province' => $req->province,
                'city' => $req->city,
                'role' => $req->roles
            ]);
            if (!empty($req->password)) {
                User::where('id',$code)->update([
                    'password' => bcrypt($req->input('password')),
                ]);
            }
        }
        if (!$user) {
            return response()->json([
                'error' => true
            ]);
        }
        return response()->json([
            'error' => false
        ]);
    }

}
