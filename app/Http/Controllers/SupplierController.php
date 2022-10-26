<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use Auth;


class SupplierController extends Controller
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
        $supplier = DB::table('supplier')->paginate(10);

        return view('supplier.supplier',['supplier' => $supplier]);

    }

    public function supplier_add()
    {
        return view('supplier.add');
    }

    public function supplier_store(Request $request)
    {
        DB::table('supplier')->insert([
            'nama_supplier' => $request->name,
            'user' => Auth::user()->email
        ]);
        
        return redirect('/supplier');    
    }

    public function supplier_edit($id)
    {
        $supplier = DB::table('supplier')->where('id',$id)->get();
        
        return view('supplier.edit',['supplier' => $supplier]);   
    }

    public function supplier_update(Request $request)
    {
        DB::table('supplier')->where('id',$request->id)->update([
            'nama_supplier' => $request->name
        ]);
        
        return redirect('/supplier');
    }

    public function supplier_delete($id)
    {
        DB::table('supplier')->where('id',$id)->delete();

        return redirect('/supplier');
    }
}
