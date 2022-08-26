@extends('layouts.topnav')
@section('content')
<div class="col-lg-12">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Lihat Data User</h3>
            <a href="{{ route('user.index') }}" class="float right"><i class="fa fa-back"></i> Back </a>
            <!-- <div class="btn btn-sm btn-primary float-right" href="{{ route('siswa.create') }}">Add Data <i class="fa fa-plus"></i></div> -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row">Email</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Nama Lengkap</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</div>
@endsection