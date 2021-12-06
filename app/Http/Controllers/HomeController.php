<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Promo;

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

    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
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

    /**
     * @return Application|Factory|View
     */
    public function bonus()
    {
        $user = Auth::user();
        return view('bonus')->with([
            'user' => $user
        ]);
    }

    public function orderHistory()
    {
        return view('orderHistory');
    }

    public function promo()
    {
        $promos = Promo::all();
        return view('promo')->with(['promos' => $promos]);
    }

    public function payAndDelivery()
    {
        $texts  = Settings::all()->whereIn('name', ['Pay', 'Delivery']);
        return view('pay_and_delivery')->with(['text' => $texts]);
    }
    public function payAndDeliveryEdit(Request $request){
        $texts  = Settings::all()->whereIn('name', ['Pay', 'Delivery']);
        if ($request->method() == 'POST'){
            foreach($request->settings as $k => $item) {
                $s = Settings::find($k);
                $s->data = $item;
                $s->save();
            }
            return redirect()->route('payAndDelivery');

        } else {
            return view('payAndDeliveryEdit')->with(['text' => $texts]);
        }
    }

    public function contract()
    {
        $texts  = Settings::all()->whereIn('name', ['Dogovor'])->first();
        return view('contract')->with(['text' => $texts]);
    }

    public function contractEdit(Request $request){
        $texts  = Settings::all()->whereIn('name', ['Dogovor']);
        if ($request->method() == 'POST'){
            foreach($request->settings as $k => $item) {
                $s = Settings::find($k);
                $s->data = $item;
                $s->save();
            }
            return redirect()->route('contract');

        } else {
            return view('contractEdit')->with(['text' => $texts]);
        }
    }
}
