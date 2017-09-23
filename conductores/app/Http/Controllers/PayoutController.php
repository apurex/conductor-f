<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payout;

class PayoutController extends Controller
{
    //
    public function create(){

		$payout = new payout;
        return view('payout.create')->with(['payout' => $payout]);
    
	}

	public function store(Request $request){

		$payout = new Payout;

		$payout->fill(

			$request->only('plan','num_ref','last_payout')

		);
		
		$payout->user_id = $request->user()->id;
		$payout->name = $request->user()->name;
		$payout->last_name = $request->user()->last_name;
		$payout->active = 0;
        $payout->left_days = 30;

        $fecha= new \DateTime();
        $fecha->add(new \DateInterval('P30D'));
        
        $payout->exp_date = $fecha;

    	$payout->save();

		return redirect()->route('payouts_path');;

	}

	public function edit(Payout $payout)
    {
        $payout = Payout::first($payout->id);
        if($payout->user_id != \Auth::user()->id) {
            return redirect()->route('payouts_path');
        }
        
        return view('payout.edit')->with(['payout' => $payout]);
    }


    public function update(Payout $payout, Request $request)
    {
        $payout->update(
           $request->only('content')
        );

        //session()->flash('message', 'payout Updated!');

        return redirect()->route('payouts_path', ['payout' => $payout->id]);
    }

    public function delete(Request $request)
    {
        $payout = Payout::first($request->id);
        if($payout->user_id != \Auth::user()->id) {
            return redirect()->route('payouts_path');
        }
        $payout->delete();

       // session()->flash('message', 'payout Deleted!');

        return redirect()->route('payouts_path');

    }

	public function index()
    {
        $payouts = Payout::with('user')->orderBy('id', 'desc')->paginate(10);

        return view('payout.index')->with(['payouts' => $payouts]);
    }
    public function confirm_pago(Request $payout) {

        \DB::table('payouts')
            ->where('id', $payout->id)
            ->update(['active' => 1]);

        return redirect()->route('show_pagos');

    }
}
