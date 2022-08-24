@extends('layouts.topnav')
@section('content')
<div class="col-lg-12">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Lihat Data Siswa</h3>
            <!-- <div class="btn btn-sm btn-primary float-right" href="{{ route('siswa.create') }}">Add Data <i class="fa fa-plus"></i></div> -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row">Nomor Induk Siswa</th>
                        <td>{{ $siswa->nis }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Nama Lengkap</th>
                        <td>{{ $siswa->nama }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</div>
@endsection