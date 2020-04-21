@extends('layouts.template')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/kategori-barang') }}">Kategori Barang</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Kategori Barang</h6>
                    </div>
                    <div class="card-body">
                        <form class="user" method="POST" action="{{ url('kategori-barang/'. $kategoriBarang->id) }}">
                            @method('PUT')
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="nama">Nama Kategori Barang</label>
                                <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Kategori Barang" name="nama" value="@if(count($errors) > 0){{ old('nama') }}@else{{$kategoriBarang->nama}}@endif">
                            </div>

                            <div class="mt-5">
                                <button type="submit" name="btn_simpan" value="simpan" class="btn btn-primary">Simpan</button>
                                <a href="{{ url('/kategori-barang') }}" class="btn btn-danger">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

@stop

      