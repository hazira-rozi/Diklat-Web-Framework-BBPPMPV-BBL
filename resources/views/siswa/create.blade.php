@extends('layouts.topnav')

@section('content')
<div class="col-lg-12">
    <!-- general form elements -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Siswa</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('siswa.store')}}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="nisinput">NIS</label>
                    <input type="text" class="form-control" name ="nis" id="nis" placeholder="Isi Nomor Induk Siswa">
                </div>
                <div class="form-group">
                    <label for="namainput">Nama</label>
                    <input type="text" class="form-control" name ="nama" id="nama" placeholder="Isi Nama Siswa">
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