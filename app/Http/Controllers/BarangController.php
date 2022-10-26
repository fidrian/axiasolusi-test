<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use Auth;


class BarangController extends Controller
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
        $barang = DB::table('barang')->paginate(10);

        return view('barang.barang',['barang' => $barang]);

    }

    public function barang_add()
    {
        $supplier = \DB::table('supplier')->get();
        return view('barang.add',['supplier' => $supplier]);
    }

    public function barang_store(Request $request)
    {
        DB::table('barang')->insert([
            'nama_barang' => $request->name,
            'user' => Auth::user()->email,
            'id_supplier' => $request->supplier,
        ]);
        
        return redirect('/barang');    
    }

    public function barang_edit($id)
    {
        $barang = DB::table('barang')->where('id',$id)->get();
        $supplier = \DB::table('supplier')->get();
        
        return view('barang.edit',['barang' => $barang, 'supplier' => $supplier]);   
    }

    public function barang_update(Request $request)
    {
        DB::table('barang')->where('id',$request->id)->update([
            'nama_barang' => $request->name,
            'user' => Auth::user()->email,
            'id_supplier' => $request->supplier,
        ]);
        
        return redirect('/barang');
    }

    public function barang_delete($id)
    {
        DB::table('barang')->where('id',$id)->delete();

        return redirect('/barang');
    }
}
