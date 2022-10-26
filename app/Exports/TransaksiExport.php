<?php

namespace App\Exports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\FromCollection;

class TransaksiExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Transaksi::select('barang.nama_barang','transaksi.jumlah_keluar','transaksi.tanggal','users.name','transaksi.user','supplier.nama_supplier')
        ->join('barang','barang.id','=','transaksi.id_barang')
                        ->join('supplier','supplier.id','=','transaksi.id_supplier')
                        ->join('users','users.email','=','transaksi.user')
                        ->get();
    }
}
