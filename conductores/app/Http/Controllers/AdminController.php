<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conduct;
use App\User;
use App\Payout;

class AdminController extends Controller
{
    public function index(){

    	return view('admin.index_admin');
    }

    public function show_user() {

    	$users = User::where('roles',2)->orderBy('id', 'desc')->paginate(20);
    	return view('admin.show_user')->with(['users' => $users]);

    }

    public function show_conduct() {

    	$conducts = Conduct::orderBy('id', 'desc')->paginate(20);
    	return view('admin.show_conduct')->with(['conducts' => $conducts]);

    }
    public function show_pagos() {

        $payouts = Payout::orderBy('id', 'desc')->paginate(20);
        return view('admin.pagos')->with(['payouts' => $payouts]);

    }
    public function confirm_pago(Payout $payout) {

        DB::table('payouts')
            ->where('id', 1)
            ->update(['active' => 1]);

        
        return redirect()->route('show_pagos');

    }

}
