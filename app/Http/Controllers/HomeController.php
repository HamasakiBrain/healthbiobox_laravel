<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->user = Auth::user();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        return view('home')->with([
            'user' => $user
        ]);
    }


    public function profile()
    {
        $user = Auth::user();
        return view('profile.profile')->with(['user' => $user]);
    }

    public function profileEdit(Request $request)
    {
        $user = Auth::user();
        if ($request->method() == 'POST') {
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->delivery = $request->delivery;
            if (isset($request->password)) {
                if (Hash::check($request->old_password, $user->password)) {
                    $user->password = Hash::make($request->password);
                } else {
                    return redirect()->back()->withErrors(['password' => 'Не правильный старый пароль'])->withInput($request->all());
                }
            }
            $user->save();
            return view('profile.profile')->with(['user' => $user]);
        }
        return view('profile.edit')->with(['user' => $user]);

    }

    public function bonus()
    {
        return view('bonus');
    }

    public function orderHistory()
    {
        return view('orderHistory');
    }

    public function promo()
    {
        return view('promo');
    }

    public function payAndDelivery()
    {
        return view('pay_and_delivery');
    }

    public function contract()
    {
        return view('contract');
    }

}
