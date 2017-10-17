<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Score;
use App\Conduct;

class ScoreController extends Controller
{
    public function create()
    {
    	$score = new Score;
        return view('score.create')->with(['score' => $score]);
    }
    public function store(Request $request){

		$score = new Score;

		$score->fill(

			$request->only('score','review','conduct_id')

		);
		
		$score->user_id = $request->user()->id;
		
        $score->save();

		return redirect()->route('scores');;

	}

	public function update(Payout $score, Request $request)
    {
        $score->update(
           $request->only('score','review')
        );

        //session()->flash('message', 'score Updated!');

        return redirect()->route('scores', ['score' => $score->id]);
    }

    public function delete($request)
    {
    	$score = Score::first($request->id);
        if($score->user_id != \Auth::user()->id) {
            return redirect()->route('scores');
        }
        $score->delete();

       // session()->flash('message', 'score Deleted!');

        return redirect()->route('scores');

    }
}
