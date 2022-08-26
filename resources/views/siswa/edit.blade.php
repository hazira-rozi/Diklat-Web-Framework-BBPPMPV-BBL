@extends('layouts.topnav')

@section('content')
<div class="col-lg-12">
    <!-- general form elements -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Ubah Data Siswa</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('siswa.update',$siswa->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="nisinput">NIS</label>
                    <input type="text" class="form-control" name="nis" id="nis" placeholder="Isi Nomor Induk Siswa" value="{{$siswa->nis}}">
                </div>
                <!--tambahkan-->
                <div class="form-group">
                    <label for="namainput">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Isi Nama Siswa" value="{{$siswa->nama}}">
                </div>
                <div class="form-group">
                    <label for="nama">KELAS</label>
                    <select class="form-control" name="tingkat_id">
                        @foreach ($tingkat_siswa as $tingkat)
                        <option value="{{ $tingkat->id }}" {{ $tingkat->id ==$siswa->tingkat_id?'selected':'' }}>{{ $tingkat->kelas }}</option>
                        @endforeach

                    </select>
                </div>

                <div class="form-group">
                    <label for="inputFile">File Input</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="gambar" name="gambar">
                            <label class="custom-file-label" for="inputFile">Choose file</label>
                        </div>
                    </div>
                </div>

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