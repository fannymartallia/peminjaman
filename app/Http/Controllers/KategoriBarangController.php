<?php

namespace App\Http\Controllers;

use App\Models\KategoriBarang;
use Illuminate\Http\Request;

use Session;

class KategoriBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_kategori = KategoriBarang::all();

        return view('admin/kategori_barang/index', compact('data_kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/kategori_barang/tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new KategoriBarang;
 
        $this->validate($request, [
            'nama' => 'required|unique:kategori_barang,nama,' . $data->id
        ]);
            
        $data->nama = $request->nama;
        $data->save();

        Session::flash('pesan_sukses', 'Data Berhasil ditambah');
        return redirect('kategori-barang');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KategoriBarang  $kategoriBarang
     * @return \Illuminate\Http\Response
     */
    public function show(KategoriBarang $kategoriBarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KategoriBarang  $kategoriBarang
     * @return \Illuminate\Http\Response
     */
    public function edit(KategoriBarang $kategoriBarang)
    {
        return view('admin/kategori_barang/edit', compact('kategoriBarang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KategoriBarang  $kategoriBarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KategoriBarang $kategoriBarang)
    {
        $this->validate($request, [
            'nama' => 'required|unique:kategori_barang,nama,' . $kategoriBarang->id
        ]);
            
        $kategoriBarang->nama = $request->nama;
        $kategoriBarang->save();

        Session::flash('pesan_sukses', 'Data Berhasil diedit');
        return redirect('kategori-barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KategoriBarang  $kategoriBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy(KategoriBarang $kategoriBarang)
    {
        $kategoriBarang->delete();

        Session::flash('pesan_sukses', 'Data Berhasil dihapus');
        return redirect('kategori-barang');
    }
}
