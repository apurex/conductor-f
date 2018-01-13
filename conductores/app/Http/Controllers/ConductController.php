<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conduct;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use DB;

class ConductController extends Controller
{
    
	public function create(){

		$conduct = Conduct::where('user_id', Auth::user()->id)->get();
    	//dd($conduct);

		return view('conductor.create')->with(['conduct' => $conduct->first()]);

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

        $nro = $request->get('num');

        $user = Auth::user();
        $file = $request->file('file');
        $url = $file->getClientOriginalExtension();

        $path = $request->file('file')->storeAs('public/imgs/cars/car_' . Auth::user()->id, 'car_' . $nro . '.' . 'jpg');

        return response()->json(['success'=>$path]);

        //return back();

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

		$conduct = Conduct::where('user_id',Auth::user()->id)->first();

		

		$conduct->update(

			$request->only('car_m','car_ma','car_state','short','body','phone')

		);
			$conduct->completed = 1;
			$conduct->save();
		//$conduct->completed = 1;

		session()->flash('message', 'Perfil Actualizado Correctamente ');
		return back();

	}

	public function index (){

		//$conducts = Conduct::all();
		$conducts = Conduct::where('completed',1)->get();

		return view('conductor.conducts_index')->with(['conducts' => $conducts]);

	}

	public function index2(){

		$conducts = DB::table('conducts as c')
                     ->select(DB::raw('c.*, u.extension'))
                     ->where('completed', '=', 1)
                     ->join('users as u', 'u.id', '=', 'c.user_id')
                     ->get();
		//$conducts = Conduct::where('completed',1)->join('user', 'users.id', '=', 'conducts.user_id')->get();
		//dd($conducts);
		return $conducts;

	}

	public function show(Conduct $conduct)
    {
    	//$conduct = Conduct::with('user')->orderBy('id', 'desc')->paginate(10);
    	//$id = Auth::user()->id;
    	$user_voto = \App\Score::where([['user_id',2],['conduct_id', $conduct->id]])->first();
    	$extension = Conduct::find($conduct->id)->user()->first()->extension;

    	$ruta = 'public/imgs/cars/car_' . $conduct->user_id;
    	$dir = Storage::files($ruta);
    	$dir2 = [];

    	for ($i=0; $i < count($dir) ; $i++) { 
    		$dir2[]=str_replace("public","storage",$dir[$i]);
    	}

        return view('conductor.show')->with(['conduct' => $conduct, 'user_voto' => $user_voto, 'extension' => $extension, 'carros' => $dir2]);
    }

    public function activar_profile(Request $conduct) {

    	\DB::table('conducts')
            ->where('id', $conduct->id)
            ->update(['verif' => 1]);

            return back();
    }

    public function search(Request $request){

    	//if ($request->ajax()) {
    		$conducts = Conduct::where([['state',$request->state],
    			['completed',1]])->get();
    		/*$conductores = [];
    		foreach ($conducts as $conduct) {
    			$conductores[] = array('name' => $conduct->name, 
    				'last_name' => $conduct->last_name,
    				'short' => $conduct->short,
    				'id' => $conduct->id,
    				'user_id' => $conduct->user_id);
    		}
    		//dd($conductores);
    		return json_encode($conductores);
    	//}*/
    	return view('conductor.conducts_index')->with(['conducts' => $conducts]);
    	
    }

}
