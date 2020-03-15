<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\games;
use Add\Comment;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        $games = DB::table('games')->paginate(10);
        return view('games', ['games' => $games]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addgames');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function search(Request $request)
    {
        $search = $request->get('search');
        $games = DB::table('games')->where('name', 'like', '%'.$search.'%')->paginate(10);
        return view('games', ['games' => $games]);
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'name'          => 'required',
            'type'          => 'required',
            'review'        => 'required',
            'description'   => 'required',
            'space'         => 'required',
            'language'      => 'required',
        ]);

        $name           = $request->get('name');
        $type           = $request->get('type');
        $review         = $request->get('review');
        $description    = $request->get('description');
        $space          = $request->get('space');
        $language       = $request->get('language');
        $post = DB::insert('insert into games(name, type, review, description, space, language) value(?,?,?,?,?,?)', 
                            [$name, $type, $review, $description, $space, $language]);
        
        if($post){
            $red = redirect('admin/games')->with('seccess','Data has been added');
        } else {
            $red = redirect('admin/games/create')->with('danger','Try again');
        }
        return $red;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $games = DB::select('select * from games where id=?',[$id]);
        return view('show', ['games' => $games]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $games = DB::select('select * from games where id=?',[$id]);
        return view('editgames', ['games' => $games]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'          => 'required',
            'type'          => 'required',
            'review'        => 'required',
            'description'   => 'required',
            'space'         => 'required',
            'language'      => 'required',
        ]);

        $name           = $request->get('name');
        $type           = $request->get('type');
        $review         = $request->get('review');
        $description    = $request->get('description');
        $space          = $request->get('space');
        $language       = $request->get('language');
        $data = DB::update('update games set name=?, type=?, review=?, description=?, space=? ,language=? where id=?',
                            [$name, $type, $review, $description, $space, $language, $id]);
        if($data){
            $red = redirect('admin/games')->with('seccess','Data has been update');
        } else {
            $red = redirect('admin/games/edit/' .$id)->with('danger','Try again');
        }
        return $red;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $games = DB::delete('delete from games where id=?',[$id]);
        $red = redirect('/admin');
        return $red;

    }

    public function deleteAll(Request $request){
        $ids = $request->get('ids');
        $dbs = DB::delete('delete from games where id in ('.implode(",",$ids).')');
        return redirect('/admin');
    }
}
