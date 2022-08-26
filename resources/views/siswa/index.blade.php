@extends('layouts.topnav')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Siswa</h3>
            <a class="btn btn-sm btn-primary float-right" href="{{ route('siswa.create') }}">Add Data <i class="fa fa-plus"></i></a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th class="text-center">NIS</th>
                        <th class="text-center">Nama Siswa</th>
                        <th class="text-center">Tingkat</th>
                        <th class="text-center">Foto</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_siswa as $siswa)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $siswa->nis }}</td>
                        <td>{{ $siswa->nama }}</td>
                        <td>{{ $siswa->tingkat->kelas }}</td>
                        <td><img alt="Avatar" class="table-avatar img-thumbnail" style="height: 150px;" src="{{ asset('storage/'.$siswa->gambar) }}"></td>
                        <td class="text-center">
                            <form action="{{ route('siswa.destroy' ,$siswa->id)}}" method="post">
                                @csrf
                                <a class="btn btn-sm btn-primary" href="{{ route('siswa.show',$siswa->id) }}">View <i class="fa fa-eye"></i></a>
                                <a class="btn btn-sm btn-success" href="{{ route('siswa.edit',$siswa->id) }}">Edit <i class="fa fa-edit"></i></a>
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus siswa {{$siswa->nama}}?')">Delete <i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-footer clearfix">
                <div class="d-flex justify-content-center">
                    Showing {{($data_siswa->currentpage()-1)*$data_siswa->perpage()+1}} to {{ $data_siswa->currentpage()*(($data_siswa->perpage() < $data_siswa->total()) ? $data_siswa->perpage(): $data_siswa->total())}} of {{ $data_siswa->total()}} entries</div>
                <div class="d-flex justify-content-center">{!! $data_siswa->links() !!}</div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
@endsection