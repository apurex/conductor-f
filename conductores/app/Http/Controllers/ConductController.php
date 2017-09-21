<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conduct;
use App\User;
use Illuminate\Support\Facades\Auth;

class ConductController extends Controller
{
    
	public function create(){

		return view('conductor.create');

	}

	public function store(Request $request){

		$conduct = new Conduct;

		$this->validate($request, [

			'car_m' => 'required',
			'car_ma' => 'required',
			'car_state' => 'required|string|max:255',
			'short' => 'required',
			'body' => 'required',
			'phone' => 'required'
			]);

		$conduct->fill(

			$request->only('short','body','phone','car_m','car_ma','car_state')

			);

		$conduct->user_id = Auth::user()->id;
		$conduct->name = Auth::user()->name;
		$conduct->last_name = Auth::user()->last_name;
		$conduct->state = Auth::user()->state;

		$conduct->save();


		return redirect()->route('home');

	}

	public function index (){

		$conducts = Conduct::all();

		return view('conductor.conducts_index')->with(['conducts' => $conducts]);

	}

	public function show(Conduct $conduct)
    {
    	//$conduct = Conduct::with('user')->orderBy('id', 'desc')->paginate(10);

        return view('conductor.conduct_show')->with(['conduct' => $conduct]);
    }

    public function activar_profile(Request $conduct) {

    	\DB::table('conducts')
            ->where('id', $conduct->id)
            ->update(['verif' => 1]);

            return back();
    }

}
