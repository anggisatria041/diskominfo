<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $id=Auth::user()->id;
        $tenant = User::count('id');
        $data = User::where('id',$id)->first();
        return view("page.dashboard",compact('tenant','data'));
    }
    public function data_list()
    {
        $dt = Penjualan::all();
        $data = [];
        $start = 0;

        $top_barang = $dt->flatMap(function ($item) {
            return json_decode($item->produk, true);
        })->groupBy('barang_id')->map(function ($group) {
            return [
                'jumlah_terjual' => $group->sum('jumlah')
            ];
        })->sortByDesc('jumlah_terjual')->take(10);

        $top_barang_ids = $top_barang->keys();

        $barang_terlaris = Stok_barang::whereIn('stok_barang_id', $top_barang_ids)
            ->get()
            ->keyBy('stok_barang_id');

        foreach ($top_barang_ids as $barang_id) {
            $barang = $barang_terlaris->get($barang_id);
            if ($barang) {
                $td = [];
                $td['no'] = ++$start;
                $td['stok_barang_id'] = $barang->stok_barang_id ?? '-';
                $td['nama'] = $barang->nama ?? '-';
                $td['barcode'] = $barang->barcode ?? '-';
                $td['stok'] = $barang->stok ?? '-';
                $td['harga_beli'] = $barang->harga_beli ?? '-';
                $td['harga_jual'] = $barang->harga_jual ?? '-';
                $td['total_penjualan'] = $top_barang[$barang_id]['jumlah_terjual'] ?? 0;
                $td['actions'] = '<a href="javascript:void(0)" onclick="edit(\''.$barang->id.'\')" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit">
                                    <i class="la la-edit"></i>
                                </a>
                                <a href="javascript:void(0)" onclick="hapus(\''.$barang->id.'\')" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">
                                    <i class="la la-trash-o"></i>
                                </a>';
                $data[] = $td;
            }
        }

        return response()->json(['data' => $data]);
    }
    
}
