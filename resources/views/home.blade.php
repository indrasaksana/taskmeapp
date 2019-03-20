@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('sukses'))
    <div class="alert alert-success" role="alert">
        {{session('sukses')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    
    @endif
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <h3>Data Kegiatan Sehari-hari</h3>        
                </div>
                <div class="col-8">
                <form action="home/create" method="POST">
                    {{csrf_field()}}
                        <div class="row float-right">
                            <div class="input-group">
                                <div class="form-group mb-2">
                                    <input name="nama_task" type="text" class="form-control" placeholder="Nama Task">
                                </div>
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary mb-2">Tambah Task</button>
                                </div>
                            </div>
                </form>
                        </div>                       
            </div>
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>Nama Task</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                @foreach($data_task as $task)
                <tr>
                    <td>{{$task->nama_task}}</td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                        Edit
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <form action="home/{{$task->id}}/update" method="POST">
                            {{csrf_field()}}
                                <div class="form-group">
                                    <label>Task Baru</label>
                                    <input type="text" name="nama_task" class="form-control"  placeholder="Enter new task" value="{{$task->nama_task}}">
                                </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                                </div>
                            </div>
                        </div>
                        </div>
                        <a href="home/{{$task->id}}/delete" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                    <!-- <th>{{$task->jadwal_task}}</th> -->
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
