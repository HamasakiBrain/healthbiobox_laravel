<?php

namespace App\Http\Controllers;

use App\Http\Middleware\isAdmin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //


    public function edit_promo(Request $request) {
        return view('promo.edit');
    }
}
