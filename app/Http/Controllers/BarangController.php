<?php

namespace App\Http\Controllers;

use App\Models\KategoriBarang;
use App\Models\Barang;
use Illuminate\Http\Request;

use Session;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_barang = Barang::all();

        return view('admin/barang/index', compact('data_barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori_barang = KategoriBarang::all();
        return view('admin/barang/tambah', compact('kategori_barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Barang;
 
        $this->validate($request, [
            'kode' => 'required|unique:barang,kode,' . $data->id,
            'nama' => 'required|unique:barang,nama,' . $data->id,
            'kategori_barang_id' => 'required'
        ]);
            
        $data->kode = $request->kode;
        $data->nama = $request->nama;
        $data->kondisi = $request->kondisi;
        $data->jumlah = $request->jumlah;
        $data->satuan = $request->satuan;
        $data->kategori_barang_id = $request->kategori_barang_id;
        $data->save();

        Session::flash('pesan_sukses', 'Data Berhasil ditambah');
        return redirect('barang');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        return view('admin/barang/edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        $this->validate($request, [
            'nama' => 'required|unique:barang,nama,' . $barang->id
        ]);
            
        $barang->nama = $request->nama;
        $barang->save();

        Session::flash('pesan_sukses', 'Data Berhasil diedit');
        return redirect('barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();

        Session::flash('pesan_sukses', 'Data Berhasil dihapus');
        return redirect('barang');
    }
}
