@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Manajemen Projek'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h4>Tabel Manajemen Project</h4>
                        <a class="btn btn-outline-primary btn-xs float-end" href="{{ route('projek.create') }}" role="button">+ Tambah Data</a>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center justify-content-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Name</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Deskripsi</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Tanggal Mulai</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Tanggal Selesai</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Status
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-5">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($projects as $proyek)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2">
                                                <div class="my-auto">
                                                    <h6 class="mb-0 text-sm">{{ $proyek->title }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ $proyek->description }}</p>
                                        </td>
                                        <td>
                                            <span class="text-sm font-weight-bold">{{ $proyek->start_date }}</span>
                                        </td>
                                        <td>
                                            <span class="text-sm font-weight-bold">{{ $proyek->estimated_end_date }}</span>
                                        </td>
                                        <td>
                                            <span class="text-sm font-weight-bold">{{ $proyek->status }}</span>
                                        </td>
                                        <td class="align-middle">
                                            <a class="btn btn-primary btn-xs" href="{{ route('projek.edit', $proyek->id) }}" role="button">Edit</a>
                                            <form method="post" action="{{ route('projek.delete', $proyek->id) }}" accept-charset="UTF-8">
                                                    @csrf
                                                    <button class="btn btn-danger btn-xs" type="submit">
                                                        Hapus
                                                    </button>
                                                </form>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
