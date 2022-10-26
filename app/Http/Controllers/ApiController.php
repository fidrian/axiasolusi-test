<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;


class ApiController extends Controller
{
    public function getBarang($brg)
    {
        $getbrg = \DB::table("barang")->select('barang.nama_barang', 'barang.user', 'barang.id_supplier', 'supplier.nama_supplier')
                            ->join('supplier','supplier.id','=','barang.id_supplier')
                            ->where('barang.id', $brg)->first();

        return json_encode($getbrg);
    }
}
