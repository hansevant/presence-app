@extends('layouts.main')
@section('content')
@push('css')
    <link href="{{ ('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Kelas</h6>
        </div>
        <div class="card-body">
            <a class="btn btn-primary btn-icon-split mb-3" href="#" data-toggle="modal" data-target="#addUserModal">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Kelas</span>
            </a>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width='20px'>No</th>
                            <th>Nama Kelas</th>
                            <th>Jurusan</th>
                            <th>Fakultas</th>
                            <th width='150px'>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama Kelas</th>
                            <th>Jurusan</th>
                            <th>Fakultas</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($classes as $class)
                        <tr>
                            <td style="text-align: center">{{ $loop->iteration }}</td>
                            <td>{{ $class->class }}</td>
                            <td>{{ $class->major }}</td>
                            <td>{{ $class->faculty }}</td>
                            <td>
                                    <a href="{{ route('edit.class', ['id' => $class->id]) }}" class="btn btn-white border py-1 px-3">
                                        Edit
                                    </a>
                                    <form action="{{ route('delete.class', ['id' => $class->id]) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger border py-1 px-3" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">Hapus</button>
                                    </form>
                                </td>
                        </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Materi</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('store.class') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user"
                            placeholder="Masukkan Nama Kelas" value="{{ old('class') }}" name="class">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user"
                            placeholder="Masukkan Nama Jurusan" value="{{ old('major') }}" name="major">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user"
                            placeholder="Masukkan Nama Fakultas" value="{{ old('faculty') }}" name="faculty">
                        </div>
                        <button type="submit" class="btn btn-primary btn-user px-4 py-2 me-auto">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/demo/datatables-demo.js') }}"></script>
@endpush

@endsection