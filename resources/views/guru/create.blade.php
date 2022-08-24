@extends('layouts.topnav')

@section('content')
<div class="col-lg-12">
    <!-- general form elements -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Guru</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('guru.store')}}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="nipinput">Nomor Induk Pegawai</label>
                    <input type="text" class="form-control" name ="nip" id="$guru" placeholder="Isi Nomor Induk Pegawai">
                </div>
                <div class="form-group">
                    <label for="namainput">Nama</label>
                    <input type="text" class="form-control" name ="nama" id="nama" placeholder="Isi Nama Guru">
                </div>
                
            </div>
            <!-- /.card-body -->

            <div class="card-footer d-flex justify-content-center">
                
                <button type="submit" class="btn btn-primary mr-5">Save <i class="fa fa-save"> </i></button> 
                <button type="reset" class="btn btn-warning">Clear <i class="fa fa-eraser"></i></button>
            </div>
        </form>
    </div>
    <!-- /.card -->
</div>
@endsection