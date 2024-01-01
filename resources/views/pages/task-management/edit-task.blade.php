@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Tables'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h4>Edit Data Project</h4>
                    </div>
                    <div class="card card-primary">
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{url('/update-task',$data_task->id) }}" method="POST" >
                @csrf  
              <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title Task</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Input Title" value="{{$data_task->title}}">
                    @error('title')
                    <small>Silahkan Masukkan Title Task</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Project</label>
                    <select class="form-control" id="project_id" name="project_id">
                    <!-- <option value="{{ $data_task->project->id}}">{{ $data_task->project->title}}</option> -->
                      @foreach ($project as $projects)
                        <option value="{{ $projects->id}}" @if($data_task->project->id==$projects->id) selected @endif>{{ $projects->title}}</option>
                      @endforeach
                    </select>
                    @error('project')
                    <small>Silahkan Masukkan Judul Project</small>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Deskripsi Task</label>
                    <textarea type="text" class="form-control" id="description" name="description" placeholder="Masukkan Deskripsi">{{$data_task->description}}</textarea>
                    @error('deskripsi')
                    <small>Silahkan Masukkan Deskripsi task</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Person In Charge</label>
                    <select class="form-control" id="person_in_charge" name="person_in_charge">
                          @foreach ($user as $users)
                          @if ($users->role !="Admin")
                          <option value="{{ $users->id}}" @if($data_task->user->id==$users->id) selected @endif>{{ $users->username}}</option>
                          @endif
                          @endforeach
                    </select>
                    @error('person_in_charge')
                    <small>Silahkan Masukkan person in charge</small>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Status Task</label>
                    <select class="form-select" aria-label="Default select example" name="status">
                      <option selected>{{ $data_task->status }}</option>
                      <option value="Upcoming">Upcoming</option>
                      <option value="On Progress">On Progress</option>
                      <option value="Done">Done</option>
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