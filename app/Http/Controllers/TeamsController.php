<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['teams'] = Team::all();

        return view('teams.list', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teams.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $rules = [
//            'name' => 'required|string',
//            'description' => 'required|string'
//        ];
//
//        $validator = Validator::make($request->all(), $rules);
//        if($validator->fails()){
//
//        }else{
            $team = new Team();

            $team->name=$request->name;
            $team->description= $request->description;
            $team->save();

            return redirect(url('/teams/'));
//        }
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
        $this->data['team'] = Team::where('id', $id)->first();

        return view('teams.edit', $this->data);
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
        $team = Team::where('id', $id)->first();

        $team->name=$request->name;
        $team->description= $request->description;
        $team->save();

        return redirect(url('/teams/'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = Team::where('id', $id)->first();
        $team->delete();
        $this->data['teams'] = Team::all();

        return view('teams.list', $this->data);
    }
}
