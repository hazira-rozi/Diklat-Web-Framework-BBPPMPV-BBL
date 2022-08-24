@extends('layouts.topnav')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Guru</h3>
            <a class="btn btn-sm btn-primary float-right" href="{{ route('guru.create') }}">Add Data <i class="fa fa-plus"></i></a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered mb-2">
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
                        <td>{{ ++$i }}</td>
                        <td>{{ $guru->nip }}</td>
                        <td>{{ $guru->nama }}</td>
                        <td class="text-center">
                        <form action="{{ route('guru.destroy' ,$guru->id)}}" method="post">
                                @csrf
                                <a class="btn btn-sm btn-primary" href="{{ route('guru.show',$guru->id) }}">View <i class="fa fa-eye"></i></a>
                                <a class="btn btn-sm btn-success" href="{{ route('guru.edit',$guru->id) }}">Edit <i class="fa fa-edit"></i></a>
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus guru {{$guru->nama}}?')">Delete <i class="fa fa-trash"></i></button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                Showing {{($data_guru->currentpage()-1)*$data_guru->perpage()+1}} to {{ $data_guru->currentpage()*(($data_guru->perpage() < $data_guru->total()) ? $data_guru->perpage(): $data_guru->total())}} of {{ $data_guru->total()}} entries</div>
            <div class="d-flex justify-content-center">{!! $data_guru->links() !!}</div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</div>
@endsection