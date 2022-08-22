@extends('layouts.topnav')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Guru</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th class="text-center">NIP</th>
                        <th class="text-center">Nama Guru</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_guru as $guru)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $guru->nip }}</td>
                        <td>{{ $guru->nama }}</td>
                        <td class="text-center">
                            <a class="btn btn-sm btn-primary" href="#">View</a>
                            <a class="btn btn-sm btn-success" href="#">Update</a>
                            <a class="btn btn-sm btn-danger" href="#">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
@endsection