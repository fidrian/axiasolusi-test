<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = DB::table('users')->paginate(10);

        return view('user.user',['user' => $user]);

    }

    public function user_add()
    {
        return view('user.add');
    }

    public function user_store(Request $request)
    {
        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        
        return redirect('/user');    
    }

    public function user_edit($id)
    {
        $user = DB::table('users')->where('id',$id)->get();
        
        return view('user.edit',['user' => $user]);   
    }

    public function user_update(Request $request)
    {
        $user = \DB::table('users')->where('id', $request->id)->first();

        $password = $request->password == "" ? $user->password : Hash::make($request->password);

        DB::table('users')->where('id',$request->id)->update([
            'name' => $request->name,
            'password' => $password,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        
        return redirect('/user');
    }

    public function user_delete($id)
    {
        DB::table('users')->where('id',$id)->delete();

        return redirect('/user');
    }
}
