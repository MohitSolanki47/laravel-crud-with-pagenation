<?php

namespace App\Http\Controllers;

use App\Models\User_table;
use Illuminate\Http\Request;

class User extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('insert');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $POST = new User_table;
        $POST->name= $request->get('name_user');
        $POST->Mobile_No= $request->get('Mobile_No');
        $POST->email=$request->get('inputEmail4');
        $POST->save();
        return redirect('/');
        // dd($inputEmail4);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User_table  $user_table
     * @return \Illuminate\Http\Response
     */
    public function show(User_table $user_table)
    {
        // $User_data = User_table:: all();
        $User_data = User_table:: paginate(5);
        return view('alldata',['User_data'=>$User_data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User_table  $user_table
     * @return \Illuminate\Http\Response
     */
    public function edit(User_table $user_table,$id)
    {
        $User = User_table::find($id);
        // dd($User);
        return view('update',['User'=>$User]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User_table  $user_table
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User_table $user_table,$id)
    {
        $student = User_table::find($id);
        $student->name = $request->input('name_user');
        $student->Mobile_No = $request->input('Mobile_No');
        $student->email = $request->input('inputEmail4');
        $student->update();
        return redirect('/Alldata');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User_table  $user_table
     * @return \Illuminate\Http\Response
     */
    public function destroy(User_table $user_table, $id)
    {
        $User=User_table::find($id);
        $User->delete();
        return redirect('/Alldata');
    }
}
