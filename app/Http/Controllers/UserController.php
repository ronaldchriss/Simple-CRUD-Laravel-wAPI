<?php

namespace App\Http\Controllers;

use App\Models\User;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use RealRashid\SweetAlert\Toaster;

class UserController extends Controller
{
    public function user()
    {
        $user = User::all();
        return $user;
    }

    public function create(Request $req)
    {
        $validator = Validator::make(
            $req->all(),
            array(
                "name" => "unique:users,name",
                "email" => "unique:users,email"
            )
        );
        if ($validator->fails()) {
            Alert::error('User Ini Telah Terdaftar', 'Silahkan Coba Dengan Nama atau Username');
            return back();
        }else{
            $user = $this->make($req);
            toast('User Telah Ditambahkan', 'success', 'bottom-right');
            return back();
        }
    }

    private function make(Request $req){
        $user = User::make([
            'name' => $req->name,
            'phone' => $req->phone,
            'password' => bcrypt($req->input('password')),
            'remeber_token' => Str::random(8),
            'email' => $req->email,
            'gender' => $req->gender,
            'old' => $req->old,
            'province' => $req->province,
            'city' => $req->city,
        ]);
        if (!$user) {
            return response()->json([
                'error' => true
            ]);
        } else {
            return response()->json([
                'error' => false
            ]);
        }
    }

}
