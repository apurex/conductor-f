<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conduct;
use App\User;
use Illuminate\Support\Facades\Auth;

class ConductController extends Controller
{
    
	public function create(){

		$conduct = new Conduct;

		return view('conductor.create')->with(['conduct' => $conduct]);

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

	public function img_car (Request $request) {

		$this->validate($request, [
            'file' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        $nro = $request->get('nro');

        $user = Auth::user();
        $file = $request->file('file');
        $url = $file->getClientOriginalExtension();

        $path = $request->file('file')->storeAs('public/imgs/cars/car_' . Auth::user()->id, 'car_' . $nro . '.' . $url);

        return back();

	}

	public function edit (){
		return view('conductor.edit');
	}

	public function update (Request $request){

		$this->validate($request, [

			'car_m' => 'required',
			'car_ma' => 'required',
			'car_state' => 'required|string|max:255',
			'short' => 'required',
			'body' => 'required',
			'phone' => 'required'
			]);

		$conduct = Conduct::find(Auth::user()->id);

		$conduct->update(

			$request->only('car_m','car_ma','car_state','short','body','phone')

		);

		session()->flash('message', 'Perfil Actualizado Correctamente ');

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
