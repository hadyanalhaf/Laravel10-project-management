@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Tables'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h4>Tambah Project Baru</h4>
                    </div>
                    <div class="card card-primary">
              <!-- /.card-header -->
              <!-- form start -->
              <form action=" {{route('projek.store') }}" method="POST" >
                @csrf  
              <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Judul Project</label>
                    <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Nama">
                    @error('judul')
                    <small>Silahkan Masukkan Judul Project</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Deskripsi Project</label>
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukkan Deskripsi">
                    @error('deskripsi')
                    <small>Silahkan Masukkan Deskripsi Project</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Tanggal Mulai</label>
                    <input type="date" class="form-control" id="tglmulai" name="tglmulai" placeholder="">
                    @error('tglmulai')
                    <small>Silahkan Masukkan Tanggal pada form Tanggal Mulai</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Estimasi Selesai</label>
                    <input type="date" class="form-control" id="tglselesai" name="tglselesai" placeholder="Password">
                    @error('tglselesai')
                    <small>Silahkan Masukkan Tanggal pada form Estimasi Selesai</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Status Project</label>
                    <select class="form-select" aria-label="Default select example" name="status">
                      <option selected>Pilih Salah Satu</option>
                      <option value="Upcoming">Upcoming</option>
                      <option value="On Progress">On Progress</option>
                      <option value="Done">Done</option>
                      <option value="Delayed">Delayed</option>
                  </select>
                </div>

                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
                </div>
            </div>
        </div>
        <br>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
