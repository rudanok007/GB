<?php


namespace Modules\Users\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    public function index()
    {
        return view('users::index');
    }

    public function getLogin()
    {
        return view('users::login');
    }

    public function auth(Request $request)
    {
//        return dd($request->all());
        $credentials = $this->validate($request, [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $credentials = $request->only(['email', 'password']);

        $remember = $request->get('remember');
        if(!Auth::user()){
            if (Auth::attempt($credentials, $remember)) {
                $request->session()->regenerate();
                redirect('/');
            }
            else {
                return 'Пользователь не авторизован';
            }
        }
        else {
           return redirect('/');
        }
    }

    public function logout()
    {
        Session::flash('_token');
        Auth::logout();
        return redirect('/');
    }
}
