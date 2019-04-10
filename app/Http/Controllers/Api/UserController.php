<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Request\Api\UserRequest;


class UserController extends Controller
{
    //
    public function index() {
        return response()->json([
            'data' => 'this is data', 
            'msg' => 'this is msg'
        ]);
    }

    //用户注册
    public function store(UserRequest $request){
        User::create($request->all());
        return '用户注册成功。。。';
    }
    //用户登录
    public function login(Request $request){
        $res=Auth::guard('web')->attempt(['name'=>$request->name,'password'=>$request->password]);
        if($res){
            return '用户登录成功...';
        }
        return '用户登录失败';
    }

}
