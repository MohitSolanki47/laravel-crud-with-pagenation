<?php

namespace App\Http\Controllers;

use App\Models\User_table;
use Illuminate\Http\Request;

use App\Mail\MyEmail;
use Illuminate\Support\Facades\Mail;

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
        $POST->email= $request->get('User_Email');
        
        // Mail Send  Start
        $details = [
            'title' => $request->get('name_user'),
            'body' => $request->get('Mobile_No')
        ];
        // $emails = array("mohit.s@arhamshare.com", "software@arhamshare.com");

        \Mail::to($request->get('User_Email'))->send(new \App\Mail\MyEmail($details));
        // Mail Send  End

        // File Upolad Start
        $fileName = time().'.'.$request->Image->extension();  // Get File Name And Extension
        $image = $request->file('Image');    // Get File 
        $image_name = time().'.'.$image->getClientOriginalExtension(); // Get File Name And Extension
        
        $destinationPath = 'E:/Laravel_curd/'; // Upload File Path
        $path =  $image->move($destinationPath, $image_name);  // Upload Image
        $POST->File_Path=$path;   // Upload Image Path For Database
        // File Upolad End
        
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
