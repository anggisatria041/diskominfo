<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aplikasi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class AplikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("page.aplikasi");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'tgl_pengajuan' => 'required',
            'keterangan' => 'required',
            'nama_aplikasi' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal memasukkan data',
                'data' => $validator->errors()
            ]);
        }

         $data = Aplikasi::create([
            'tgl_pengajuan' => $request->tgl_pengajuan,
            'keterangan' => $request->keterangan,
            'nama_aplikasi' => $request->nama_aplikasi,
            'user_id' => Auth::user()->id
        ]);

        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Sukses Memasukkan Data',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menyimpan data',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Aplikasi::findOrFail($id);
        return response()->json(['data' => $data], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->aplikasi_id;
        $data = Aplikasi::find($id);

        $rules = [
            'tgl_pengajuan' => 'required',
            'keterangan' => 'required',
            'nama_aplikasi' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Semua Data Harus Terisi',
                'data' => $validator->errors()
            ]);
        }
        if (!$data) {
            return response()->json([
                'status' => false,
                'message' => 'Data Karyawan tidak ditemukan',
            ]);
        }
        $data->update([
            'tgl_pengajuan' => $request->tgl_pengajuan,
            'keterangan' => $request->keterangan,
            'nama_aplikasi' => $request->nama_aplikasi,
        ]);

        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Sukses Mengubah Data',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Gagal Mengubah data',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function data_list()
    {
        $dt = Aplikasi::leftJoin('users as u', 'u.id', '=', 'aplikasi.user_id')
            ->select('aplikasi.*', 'u.nama')
            ->orderBy('aplikasi.aplikasi_id', 'desc')
            ->get();

        $data = array();
        $start = 0;
        foreach ($dt as $key => $value) {
            $td = array();
            $td['no'] = ++$start;
            $td['aplikasi_id'] = $value->aplikasi_id ?? '-';
            $td['nama_aplikasi'] = $value->nama_aplikasi ?? '-';
            $td['tgl_pengajuan'] = $value->tgl_pengajuan ?? '-';
            $td['keterangan'] = $value->keterangan ?? '-';
            $td['pic'] = $value->nama ?? '-';
            $td['actions'] ='<a href="javascript:void(0)" onclick="edit(\''.$value->aplikasi_id.'\')" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit">
                                <i class="la la-edit"></i>
                            </a>
                            <a href="javascript:void(0)" onclick="hapus(\''.$value->aplikasi_id.'\')" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">
                                <i class="la la-trash-o"></i>
                            </a>';
            $data[] = $td;
        }
        return response()->json(['data' => $data]);
    }

}
