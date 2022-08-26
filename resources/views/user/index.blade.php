@extends('layouts.topnav')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar User</h3>
            <a class="btn btn-sm btn-primary float-right" href="{{ route('user.create') }}">Add Data <i class="fa fa-plus"></i></a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Nama User</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_user as $user)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->name }}</td>
                        <td class="text-center">
                            <form action="{{ route('user.destroy' ,$user->id)}}" method="post">
                                @csrf
                                <a class="btn btn-sm btn-primary" href="{{ route('user.show',$user->id) }}">View <i class="fa fa-eye"></i></a>
                                <a class="btn btn-sm btn-success" href="{{ route('user.edit',$user->id) }}">Edit <i class="fa fa-edit"></i></a>
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus User {{$user->name}}?')">Delete <i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-footer clearfix">
                <div class="d-flex justify-content-center">
                    Showing {{($data_user->currentpage()-1)*$data_user->perpage()+1}} to {{ $data_user->currentpage()*(($data_user->perpage() < $data_user->total()) ? $data_user->perpage(): $data_user->total())}} of {{ $data_user->total()}} entries</div>
                <div class="d-flex justify-content-center">{!! $data_user->links() !!}</div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
@endsection