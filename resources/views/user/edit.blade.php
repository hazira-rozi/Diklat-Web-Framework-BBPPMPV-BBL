@extends('layouts.topnav')

@section('content')
<div class="col-lg-12">
    <!-- general form elements -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Ubah Data User</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('user.update',$user->id)}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="card-body">
                <div class="form-group">
                    <label for="nipinput">Email</label>
                    <input type="text" class="form-control" name ="nip" id="nip" placeholder="Isi Nomor Induk Pegewai" value="{{$user->email}}">
                </div>
                <div class="form-group">
                    <label for="namainput">Nama Lengkap</label>
                    <input type="text" class="form-control" name ="name" id="name" placeholder="Isi Nama user" value="{{$user->name}}">
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