<?php

namespace App\Http\Controllers;

use App\Coach;
use App\Team;
use App\Type;
use App\User;
use Illuminate\Http\Request;

class CoachesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['coaches'] = Coach::all();

        return view('coaches.list', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['types'] = Type::all();
        $this->data['teams'] = Team::all();
        return view('coaches.new', $this->data);
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
            $coach = new Coach();
            $coach->user_id = $user->id;
            $coach->team_id= $request->team;
            $coach->type_id= $request->type;
            $coach->save();
        }


        return redirect(url('/coaches/'));
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
        $this->data['coach'] = Coach::where('id', $id)->first();
        $this->data['types'] = Type::all();
        $this->data['teams'] = Team::all();

        return view('coaches.edit', $this->data);
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
            $coach = Coach::where('user_id', $id)->first();
            $coach->team_id= $request->team;
            $coach->type_id= $request->type;
            $coach->save();

            return redirect(url('/coaches/'));
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
        $team = Coach::where('id', $id)->first();
        $team->delete();
        $this->data['coaches'] = Coach::all();

        return view('coaches.list', $this->data);
    }
}
