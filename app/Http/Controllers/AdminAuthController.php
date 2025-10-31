<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{

    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required','email'],
            'password' => ['required'],
        ],[
            'email.required'    => 'メールアドレスは必須です。',
            'email.email'       => '正しい形式で入力してください。',
            'password.required' => 'パスワードは必須です。',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();     // セッション固定化対策
            return redirect('/menu')->with('status','ログインしました！');
        }

        return back()->withErrors([
            'email' => 'メールアドレス または パスワードが違います。',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }
    
    public function showRegisterForm()
    {
        return view('admin.register');
    }

    public function register(Request $request)
    {
        
        $validated = $request->validate(
            [
                'user_name' => ['required', 'string', 'max:50'],
                'email'     => ['required', 'email', 'max:255', 'unique:users,email'],
                'password'  => ['required', 'string', 'min:8', 'confirmed'], 
            ],
            [
                'user_name.required' => 'ユーザー名は必須です。',
                'user_name.max'      => 'ユーザー名は50文字以内で入力してください。',
                'email.required'     => 'メールアドレスは必須です。',
                'email.email'        => '正しいメールアドレスの形式で入力してください。',
                'email.unique'       => 'このメールアドレスは既に使用されています。',
                'password.required'  => 'パスワードは必須です。',
                'password.min'       => 'パスワードは8文字以上で入力してください。',
                'password.confirmed' => 'パスワード（確認）と一致しません。',
            ]
        );

        $user = new User();
        $user->name     = $validated['user_name'];
        $user->email    = $validated['email'];
        $user->password = Hash::make($validated['password']); 
        $user->save();

        return redirect('/menu')->with('status', '管理ユーザーを登録しました。');
    }
}