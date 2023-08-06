@extends('master')
@section('title', 'Login User')
@section('sidebar', '')
@section('navbar', '')
@section('footer', '')
@section('content')
    <div class="row justify-content-center min-vh-100 align-items-center">
        <div class="col-xl-4 col-lg-4 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Login To This Event</h1>
                                </div>

                                @if($status = Session::get('status'))
                                    @if($message = Session::get('message'))
                                        <div class="alert alert-{{ $status }} alert-dismissible fade show" role="alert">
                                            {{ $message }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                @endif

                                <form class="user" method="POST" action="{{ route('user.login.process') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user @error('username') is-invalid @enderror"
                                               placeholder="Username" name="username">
                                        @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                               placeholder="Password" name="password">
                                        @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @endif
                                    </div>
                                    <div class="text-center mb-3">
                                        <a class="small" href="forgot-password.html">Lupa Password?</a>
                                    </div>
                                    <button class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
