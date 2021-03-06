@extends('layouts.template')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Users</li>
            </ol>
        </nav>

        <h3 class="mb-3 text-gray-800">Data Users</h3>
        <a href="{{ url('users/create') }}" class="btn btn-sm btn-success mb-3"><i class="fa fa-plus"></i> Tambah Users</a>

        <div class="row col-md-6">

            @if(Session::has('pesan_sukses'))
                <div class="alert alert-success full">
                    <i class='fa fa-check mr-2'></i> {{ Session::get('pesan_sukses')}}
                </div>
            @endif

            <table class="table table-hover table-bordered" style="background: white">
                <tr>
                    <th width="10px">No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th width="25%">Action</th>
                </tr>
                <?php $i = 1; ?>
                @foreach($data_users as $user)
                <tr>
                    <td>{{ $i++ }}</td>   
                    <td>{{ $user->name }}</td>  
                    <td>{{ $user->email }}</td>  
                    <td>
                        <a class="btn btn-sm btn-info" href="{{ url('users/'. $user->id . '/edit') }}"><i class="fa fa-edit"></i></a>

                        <form action="{{url('users', $user->id)}}" method="post" style="display: inline-block;">
                            @method('DELETE')
                            {{ csrf_field() }}
                            <button type="submit" data-original-title='Hapus' class="btn btn-danger btn-sm tooltips" onclick='return konfirmasiHapus()'><i class="fa fa-trash"></i></button>
                        </form>
                    </td>           
                </tr>
                @endforeach

                @if(count($data_users) == 0)
                <tr>
                    <td colspan="3" align="center">Data Masih Kosong</td>
                </tr>
                @endif
            </table>
        </div>

    </div>

@stop

      