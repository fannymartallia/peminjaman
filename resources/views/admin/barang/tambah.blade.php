@extends('layouts.template')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/barang') }}">Data Barang</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Tambah Kategori Barang</h6>
                    </div>
                    <div class="card-body">
                        <form class="user" method="POST" action="{{ url('barang') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="kode">Kode</label>
                                <input type="text" class="form-control" id="kode" placeholder="Masukkan Kode  Barang" name="kode" value="@if(count($errors) > 0){{ old('kode') }}@endif">

                                @if ($errors->has('kode'))
                                    <span for="kode" class="text-danger">{{ $errors->first('kode') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Barang</label>
                                <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama  Barang" name="nama" value="@if(count($errors) > 0){{ old('nama') }}@endif">

                                @if ($errors->has('nama'))
                                    <span for="nama" class="text-danger">{{ $errors->first('nama') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="kondisi">Kondisi</label>
                                <select name="kondisi" id="kondisi" class="form-control" required>
                                    <option value="">-- Pilih --</option>
                                    <option value="baik" @if(count($errors) > 0){{ old('kondisi') }}@endif>Baik</option>
                                    <option value="rusak" @if(count($errors) > 0){{ old('kondisi') }}@endif>Rusak</option>
                                </select>

                                @if ($errors->has('kondisi'))
                                    <span for="kondisi" class="text-danger">{{ $errors->first('kondisi') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input type="number" class="form-control" id="jumlah" placeholder="Masukkan Jumlah" name="jumlah" value="@if(count($errors) > 0){{ old('jumlah') }}@endif">

                                @if ($errors->has('jumlah'))
                                    <span for="jumlah" class="text-danger">{{ $errors->first('jumlah') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="satuan">Satuan</label>
                                <select name="satuan" id="satuan" class="form-control" required>
                                    <option value="">-- Pilih --</option>
                                    <option value="biji" @if(count($errors) > 0){{ old('satuan') }}@endif>Biji</option>
                                    <option value="dus" @if(count($errors) > 0){{ old('satuan') }}@endif>Dus</option>
                                </select>

                                @if ($errors->has('satuan'))
                                    <span for="satuan" class="text-danger">{{ $errors->first('satuan') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="kategori_barang_id">Kategori Barang</label>
                                <select name="kategori_barang_id" id="kategori_barang_id" class="form-control" required>
                                    <option value="">-- Pilih --</option>
                                    @foreach($kategori_barang as $kategori)
                                        <option value="{{$kategori->id}}" @if(count($errors) > 0){{ old('kategori_barang_id') }}@endif>
                                            {{$kategori->nama}}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('kategori_barang_id'))
                                    <span for="kategori_barang_id" class="text-danger">{{ $errors->first('kategori_barang_id') }}</span>
                                @endif
                            </div>


                            <div class="mt-5">
                                <button type="submit" name="btn_simpan" value="simpan" class="btn btn-primary">Simpan</button>
                                <a href="{{ url('/barang') }}" class="btn btn-danger">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

@stop

      