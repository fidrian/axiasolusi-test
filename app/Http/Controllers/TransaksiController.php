<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Exports\TransaksiExport;
use Maatwebsite\Excel\Facades\Excel;

class TransaksiController extends Controller
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
        $transaksi = DB::table('transaksi')->paginate(10);

        return view('transaksi.transaksi',['transaksi' => $transaksi]);

    }

    public function transaksi_add()
    {
        $barang = \DB::table('barang')->get();
        return view('transaksi.add',['barang' => $barang]);
    }

    public function transaksi_store(Request $request)
    {
        $barang = \DB::table('barang')->where('id', $request->barang)->first();

        DB::table('transaksi')->insert([
            'id_barang' => $request->barang,
            'jumlah_keluar' => $request->jumlah,
            'tanggal' => $request->tanggal,
            'user' => $barang->user,
            'id_supplier' => $barang->id_supplier
        ]);
        
        return redirect('/transaksi');    
    }

    public function transaksi_edit($id)
    {
        $transaksi = DB::table('transaksi')->where('id',$id)->get();
        $barang = \DB::table('barang')->get();
        
        return view('transaksi.edit',['transaksi' => $transaksi, 'barang' => $barang]);   
    }

    public function transaksi_update(Request $request)
    {
        $barang = \DB::table('barang')->where('id', $request->barang)->first();

        DB::table('transaksi')->where('id',$request->id)->update([
            'id_barang' => $request->barang,
            'jumlah_keluar' => $request->jumlah,
            'tanggal' => $request->tanggal,
            'user' => $barang->user,
            'id_supplier' => $barang->id_supplier
        ]);
        
        return redirect('/transaksi');
    }

    public function transaksi_delete($id)
    {
        DB::table('transaksi')->where('id',$id)->delete();

        return redirect('/transaksi');
    }

    public function transaksiExport()
    {
        return Excel::download(new TransaksiExport(),'reporttransaksi.xlsx');
    }
}
