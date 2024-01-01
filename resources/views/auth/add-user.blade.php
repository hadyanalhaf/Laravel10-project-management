@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Manajemen Pengguna'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <!-- <div class="alert alert-light" role="alert">
                This feature is available in <strong>Argon Dashboard 2 Pro Laravel</strong>. Check it
                <strong>
                    <a href="https://www.creative-tim.com/product/argon-dashboard-pro-laravel" target="_blank">
                        here
                    </a>
                </strong>
            </div> -->
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Ubah Data</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <body>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('register.perform') }}">
                                        @csrf
                                        <div class="flex flex-col mb-3">
                                            <input type="text" name="username" class="form-control" placeholder="Username" aria-label="Name" value="{{$user->username}}" >
                                            @error('username') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                        </div>
                                        <div class="flex flex-col mb-3">
                                            <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email" value="{{ $user->email }}" >
                                            @error('email') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                        </div>
                                        <div class="flex flex-col mb-3">
                                            <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password">
                                            @error('password') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                        </div>
                                        <div class=" mb-3 text-center">
                                            <select name="role" class="w-50 bg-gray-200 border border-gray-200 text-gray-700 py-1 px-4 rounded text-center form-control" id="role">
                                                <option selected disabled>Role</option>
                                                <option value="Admin">Admin</option>
                                                <option value="User">User</option>
                                            </select>
                                        </div>
                                        <div class="text-center">
                                            <button class="btn bg-gradient-dark w-100 my-4 mb-2">Ubah</button>
                                        </div>
                                    </form>
                                </div>
                            </body>
                        </table>
                    </div>
                    <!-- <form method="post" action="" accept-charset="UTF-8">
                        @csrf
                        <button class="btn bg-red w-25 px-3 mb-2 mx-3 active me-2" type="submit">
                            Tambah Pengguna
                        </button>
                    </form> -->
                </div>
            </div>
        </div>
    </div>
@endsection
