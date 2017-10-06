<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conduct;
use App\User;
use App\Payout;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function create_admin(){

        return view('admin.admin_form');
    }

    public function admin_create(Request $request){

        if($request->get('admin-name') === 'adminCerio'){

            $user = Auth::user(); 
            $user->roles = 4;
            $user->save();
            session()->flash('message', 'Eres Admin');
            return back();
        }else {
            return redirect('/');
        }

    }

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

        \DB::table('payouts')
            ->where('id', $payout->id)
            ->update(['active' => 1]);

        
        return redirect()->route('show_pagos');

    }

    public function destroy(Request $request) {

        $id = $request->get('id');
        $conductt = Conduct::find($id);
        $conductu = User::find($id);

        foreach (Payout::where('user_id', $id)->cursor() as $conductp) {
            $conductp->delete();
        }

        $conductt->delete();
        $conductu->delete();

        return back();

    }

    public function deletePayout(Payout $payout){

        $pay = Payout::first($payout->id);
        $pay->delete();

        return redirect()->route('show_pagos');
    }

}
