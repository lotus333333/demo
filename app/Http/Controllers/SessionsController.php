<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    //只让未登录的用户访问登录页面
    public function  __construct()
    {
        $this->middleware('auth', ['except' => ['show','create','store']]);
        $this->middleware('guest',[
            'only' => ['create']
        ]);
    }
    public function create()
    {
        if(Auth::user()&&Auth::viaRemember()){
            return redirect()->route('users.show',[Auth::user()]);
        }
        return view('sessions.create');
    }
    //用户登录
    public function store(Request $request)
    {
        $credentials = $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            session()->flash('success', '欢迎回来！');
            $fallback = route('users.show', Auth::user());
            return redirect()->intended($fallback);
        } else {
            session()->flash('danger', '很抱歉，您的邮箱和密码不匹配');
            return redirect()->back()->withInput();
        }
    }
    //退出登录的相关逻辑
    public  function destroy()
    {
        Auth::logout();
        session()->flash('success','您已成功退出！');
        return redirect('login');
    }

}

