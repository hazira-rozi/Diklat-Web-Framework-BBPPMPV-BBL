@extends('layouts.topnav')

@section('content')
<div class="col-lg-12">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3>
                Siswa
                <div class="btn-group float-right">
                    <a class="btn btn-sm btn-primary" href="siswa/new">Add <i class="fa fa-plus"></i></a>
                </div>
            </h3>
        </div>
        <div class="card-body">
            <h5 class="card-title">Info Siswa</h5>

            <p class="card-text">
                isi mengenai siswa<br/>
                <a class="btn btn-sm btn-primary" href="siswa">LIhat Data Siswa <i class="fa fa-eye"></i></a>
            </p>
        </div>
    </div><!-- /.card -->

    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3>
                Guru
                <div class="btn-group float-right">
                    <a class="btn btn-primary" href="guru/new">Add <i class="fa fa-plus"></i></a>
                </div>
            </h3>
        </div>
        <div class="card-body">
            <h5 class="card-title">Info Guru</h5>

            <p class="card-text">
                isi mengenai guru
            </p>
        </div>
    </div><!-- /.card -->


    <!-- /.col-md-6 -->
    @endsection