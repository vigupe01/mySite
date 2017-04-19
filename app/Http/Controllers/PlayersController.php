<?php

namespace App\Http\Controllers;

use App\Player;
use App\Position;
use App\Team;
use App\User;
use Illuminate\Http\Request;

class PlayersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['players'] = Player::all();

        return view('players.list', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['positions'] = Position::all();
        $this->data['teams'] = Team::all();
        return view('players.new', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name=$request->name;
        $user->lastname1= $request->lastname1;
        $user->lastname2= $request->lastname2;
        $user->birthday= $request->birthday;
        $user->email= $request->email;
        $user->save();

        if($user){
            $player = new Player();
            $player->user_id = $user->id;
            $player->dorsal= $request->dorsal;
            if($request->is_captain == 'on'){
                $player->is_captain=1;
            }else{
                $player->is_captain=0;
            }
            $player->team_id= $request->team;
            $player->position_id= $request->position;
            $player->save();
        }


        return redirect(url('/players/'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['player'] = Player::where('id', $id)->first();
        $this->data['positions'] = Position::all();
        $this->data['teams'] = Team::all();

        return view('players.edit', $this->data);
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
        $user = User::where('id', $id)->first();
        $user->name=$request->name;
        $user->lastname1= $request->lastname1;
        $user->lastname2= $request->lastname2;
        $user->birthday= $request->birthday;
        $user->email= $request->email;
        $user->save();

        if($user){
            $player = Player::where('user_id', $id)->first();
            $player->dorsal= $request->dorsal;
            if($request->is_captain == 'on'){
                $player->is_captain=1;
            }else{
                $player->is_captain=0;
            }
            $player->team_id= $request->team;
            $player->position_id= $request->position;
            $player->save();

            return redirect(url('/players/'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = Player::where('id', $id)->first();
        $team->delete();
        $this->data['players'] = Player::all();

        return view('players.list', $this->data);
    }
}
