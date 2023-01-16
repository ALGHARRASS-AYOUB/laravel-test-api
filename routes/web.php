<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/setup',function (){
    $cred=[
        'email'=>'admin@admin.com',
        'password'=>'password'
        ];
    if(!Auth::attempt($cred)){
        $user=new User();
        $user->name='admin';
        $user->email=$cred['email'];
        $user->password=Hash::make($cred['password']);
        $user->save();

        if(Auth::attempt($cred)){
            $adminToken=$user->createToken('admin-token',['create','update','delete']);
            $updateToken=$user->createToken('admin-token',['create','update']);
            $basicToken=$user->createToken('admin-token');

            return [
                'admin-token'=>$adminToken->plainTextToken,
                'update-token'=>$updateToken->plainTextToken,
                'basic-token'=>$basicToken->plainTextToken,
            ];
            //token :
            /*
              "admin-token": "1|FEhlp0PFAA8wiMpkdut3NRv1yRM5YAX9dY5qe2eX",
              "update-token": "2|WCZ5yrqdshQic2Hxv40h2nqLQBdFHRWnMvHNj2uB",
              "basic-token": "3|ORayZMrtD29HCitQEGkAp8aIpVCbl3RmwfIIe9TX"
             */
        }

    }

});
