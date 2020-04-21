@extends('layouts.app')

@section('content')
<div class="row justify-content-center">

      <div class="col-md-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-md-12">
                <div class="pt-4 pb-5 pl-5 pr-5">
                  <div class="text-center">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="Logo sekolah" height="150px">

                    <h1 class="mt-3 h4 text-gray-900">Aplikasi Inventaris Barang</h1>
                    <h1 class="h4 text-gray-900 mb-4"><b>SMKN GLAGAH BANYUWANGI</b></h1>
                    
                  </div>
                  <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <div class="col-md-12">
                            <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mb-0">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
@endsection
