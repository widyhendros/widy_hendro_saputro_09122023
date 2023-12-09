<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawai = DB::table('users')->get();
        return view('data_diri.index',[
            'pegawai' => $pegawai
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('data_diri.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'pegawai_nama' => 'required|max:50',
            'pegawai_umur' => 'required|max:2',
            'pegawai_alamat' => 'required|max:255',
            'foto' => 'required|max:255',
        ]);

        $data = [
            'pegawai_nama' => $request->pegawai_nama,
            'pegawai_umur' => $request->pegawai_umur,
            'pegawai_alamat' => $request->pegawai_alamat,
            'foto' => $request->file('foto')->store('pagawai'),
        ];

        $action = DB::table('users')->insert($data);

        if ($action) {
            return redirect('/datapegawai')->with('success', 'Pegawai berhasil ditambahkan');
        } else {
            return redirect('/datapegawai/create')->with('error', 'Pegawai gagal ditambahkan');
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
        $pegawai = DB::table('users')->where('pegawai_id',$id)->get();
        return view('data_diri.edit',[
            'pegawai' => $pegawai
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'pegawai_nama' => 'required|max:50',
            'pegawai_umur' => 'required|max:2',
            'pegawai_alamat' => 'required|max:255',
            'foto' => 'required|max:255',
        ]);

        $data = [
            'pegawai_nama' => $request->pegawai_nama,
            'pegawai_umur' => $request->pegawai_umur,
            'pegawai_alamat' => $request->pegawai_alamat,
            'foto' => $request->file('foto')->store('pagawai'),
        ];

        $action = DB::table('users')->where('pegawai_id', $id)->update($data);

        if ($action) {
            return redirect('/datapegawai')->with('success', 'Pegawai berhasil ditambahkan');
        } else {
            return redirect('/datapegawai/create')->with('error', 'Pegawai gagal ditambahkan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $action = DB::table('users')->where('pegawai_id', $id)->delete();

        if ($action) {
            return redirect('/datapegawai')->with('success', 'Pegawai berhasil dihapus');
        } else {
            return redirect('/datapegawai')->with('error', 'Pegawai gagal dihapus');
        }
    }
}
