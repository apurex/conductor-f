<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Conduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->roles == 1) {
            // es conductor
            $conduct = Conduct::where('user_id',Auth::user()->id)->first();
            return view('home')->with(['conduct' => $conduct]);
        }
        return view('home');
    }

    public function profile_show(){

        return view('profile.profile');

    }

    public function profile_edit(){

        $ruta = 'public/imgs/cars/car_' . Auth::user()->id;
        $dir = Storage::files($ruta);
        
        $dir2 = [];

        for ($i=1; $i <= 4 ; $i++) {

            if (isset($dir[$i-1])) {
                $car = substr($dir[$i-1], strripos($dir[$i-1],'/')+1,5);
                //$dir2[$car]=str_replace("public","storage",$dir[$i-1]);
                if ($car == 'car_1') {
                    $dir2[$car]=str_replace("public","storage",$dir[$i-1]);
                }elseif($car == 'car_2'){
                    $dir2[$car]=str_replace("public","storage",$dir[$i-1]);
                }elseif($car == 'car_3'){
                    $dir2[$car]=str_replace("public","storage",$dir[$i-1]);
                }elseif($car == 'car_4'){
                    $dir2[$car]=str_replace("public","storage",$dir[$i-1]);
                }
            }
        }
        #dd($dir2);
        if (Auth::user()->roles == 1) {
            $ruta = 'storage/imgs/cars/car_' . Auth::user()->id;
            return view('profile.profile_edit')->with(['ruta' => $ruta,'carros'=>$dir2]);
        }else {
            return view('profile.profile_edit');
        }
    }

    public function profile_update (Request $request){

        $this->validate($request, [

            'name' => 'required',
            'last_name' => 'required'
            ]);

        $user = Auth::user();

        $user->update(

            $request->only('name','last_name')

            );

        session()->flash('message', 'Perfil Actualizado Correctamente ');

        return redirect()->route('profile');

    }

    public function img_store (Request $request) {

        $this->validate($request, [
            'file' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        $user = Auth::user();

        $file = $request->file('file');
        $url = $file->getClientOriginalExtension();

        $path = $request->file('file')->storeAs('public/imgs', Auth::user()->id . '.' . $url);

        $user->extension = $url;
        $user->save();

        session()->flash('message', 'Perfil Actualizado Correctamente');

        return back();

    }
}
