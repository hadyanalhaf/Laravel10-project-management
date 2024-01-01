@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'manajemen Tugas'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Tugas</h6>
                        <a class="btn btn-outline-primary btn-xs float-start"  href="\create-task">+ Tambah Data</a>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            no</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Title</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Project</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Description</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Person In Charge</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status</th>

                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($data_task as $index =>  $taskdata)

                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column">
                                                    <h6 class="mb-0 text-sm">{{$index + $data_task->firstItem() }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $taskdata->title}}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $taskdata->project->title}}</p>
                                        </td>
                                        <td class="align-middle text-center  text-sm">
                                           <!-- Tombol untuk membuka modal -->
                                           <a  class="badge badge-sm bg-gradient-info" data-bs-toggle="modal" data-bs-target="#myModal{{$taskdata->id}}">
                                            Read
                                        </a>
                                               <!-- The Modal -->
                                            <div class="modal" id="myModal{{$taskdata->id}}">
                                            <div class="modal-dialog modal-ls">
                                                <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Description</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body" style="overflow-y: auto" id="modal-body">
                                                    <h6 class="mb-0 text-sm" style="overflow-y: auto" id="input">{{ $taskdata->description }}</h6>
                                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                </div>      
                                        </td>
                                        <td class="align-middle text-center">
                                            @if ($taskdata->user)
                                                <span class="text-secondary text-xs font-weight-bold">{{ $taskdata->user->username }}</span>
                                            @else
                                                <span class="text-secondary text-xs font-weight-bold">No User Assigned</span>
                                            @endif
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                        @if($taskdata->status === 'Done')
                                            <span class="badge badge-sm bg-success">{{ $taskdata->status }}</span>
                                        @elseif($taskdata->status === 'Upcoming')
                                            <span class="badge badge-sm bg-info">{{ $taskdata->status }}</span>
                                        @elseif($taskdata->status === 'On Progress')
                                            <span class="badge badge-sm bg-warning">{{ $taskdata->status }}</span>
                                        @else
                                            <span class="badge badge-sm bg-gradient-danger">{{ $taskdata->status }}</span>
                                        @endif
                                        </td>
                                        <td class="align-middle text-end">
                                            <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                                <form class="px-3" method="post"  accept-charset="UTF-8">
                                                    <a class="btn bg-gradient-success w-100 px-2 mb-2 active me-0" href="/edit-task/{{$taskdata->id}}">
                                                        Edit
                                                    </a>
                                                </form>
                                                <form method="post"  accept-charset="UTF-8">
                                                        <a class="btn bg-gradient-primary w-100 px-2 mb-2 active me-2" href="/delete-task/{{$taskdata->id}}" onclick="confirmation(event)">
                                                        Delete
                                                        </a>

                                                        </div>      
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                    {{ $data_task->links() }}
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection

<script>
      function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');  
        console.log(urlToRedirect); 
        swal({
            title: "Yakin Ingin Menghapus ?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willCancel) => {
            if (willCancel) {
                 
                window.location.href = urlToRedirect;
               
            }  
        });
        
    }
</script>