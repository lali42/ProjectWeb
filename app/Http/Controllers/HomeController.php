<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Comment;
use App\games;

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
        $games = DB::table('games')->paginate(10);
        return view('home', ['games' => $games]);
    }

    public function show($id)
    {   
        $game = games::find($id);
        $comments = Comment::where('game_id', $id)->get();
        
        return view('show', ['game' => $game, 'comments' => $comments]);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $games = DB::table('games')->where('name', 'like', '%'.$search.'%')->paginate(10);
        return view('home', ['games' => $games]);
    }
}
