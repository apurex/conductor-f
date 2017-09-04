<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\User;
use Illuminate\Support\Facades\Auth;

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
        return view('home');
    }

    public function profile_show(){

        return view('profile.profile');

    }

    public function profile_edit(){

        return view('profile.profile_edit');

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
