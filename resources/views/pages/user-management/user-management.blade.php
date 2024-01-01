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
                    <h6>Pengguna</h6>
                    <form class="" method="GET" action="{{ route('register') }}" accept-charset="UTF-8">
                        @csrf
                        <button class="btn btn-outline-primary btn-xs float-end" type="submit">
                            + Tambah Pengguna
                        </button>
                    </form>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <head>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-4">Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Role</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Create Date
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">
                                        Action
                                    </th>
                                </tr>
                            </head>
                            <body>
                                @foreach ($username as $user)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $user->username }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ $user->role }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm font-weight-bold mb-0">{{ $user->created_at }}</p>
                                        </td>
                                        <td class="align-middle text-end">
                                            <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                                <form class="px-3" method="GET" action="{{ route('edit', $user->id) }}" accept-charset="UTF-8">
                                                    @csrf
                                                    <button class="btn bg-gradient-primary w-100 px-3 mb-2 active me-2" type="submit">
                                                        Ubah
                                                    </button>
                                                </form>
                                                <form method="POST" action="{{ route('delete', $user->id) }}" accept-charset="UTF-8">
                                                    @csrf
                                                    <button class="btn bg-gradient-primary w-100 px-3 mb-2 active me-2" type="submit">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
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
