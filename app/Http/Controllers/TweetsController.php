<?php
/**
 * App version 1.0
 * @author shariful islam khan
 * 
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;

class TweetsController extends Controller {

    public function index() {
        $tweets = auth()->user()->timeline();
        return view('tweets.index', compact('tweets'));
    }

    public function store() {

        $attribute = request()->validate([
            'body' => 'required|max:255'
        ]);

        Tweet::create([
            'user_id' => auth()->id(),
            'body' => $attribute['body']
        ]);

        return redirect('/tweets');
    }

}
