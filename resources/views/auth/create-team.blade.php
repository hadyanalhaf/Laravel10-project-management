@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Manajemen Team'])
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
                    <h6>Tambah Team</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <body>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('store.team') }}">
                                        @csrf
                                        <div class="flex flex-col mb-3">
                                            <input type="text" name="team_name" class="form-control" placeholder="Nama Team" aria-label="Name" value="" >
                                            @error('team_name') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                        </div>
                                        <div class="flex flex-col mb-3">
                                            <input type="text" name="team_description" class="form-control" placeholder="Tugas Team" aria-label="Email" value="" >
                                            @error('email') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" id="project_id" name="project_id">
                                            <option selected>--- Pilih Anggota ---</option>
                                            @foreach ($team as $teams)
                                                <option value="{{ $teams->id }}">{{ $teams->users->username }}</option>
                                            @endforeach
                                            </select>
                                            @error('project')
                                            <small>Silahkan Masukkan Anggota Team</small>
                                            @enderror
                                        </div>
                                        <div class="text-center">
                                            <button class="btn bg-gradient-dark w-100 my-4 mb-2">Tambah</button>
                                        </div>
                                    </form>
                                </div>
                            </body>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
