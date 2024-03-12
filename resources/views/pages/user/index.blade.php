@extends('layouts.main')
@section('content')
@push('css')
    <link href="{{ ('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Manajemen Pengguna</h6>
        </div>
        <div class="card-body">
            <a class="btn btn-primary btn-icon-split mb-3" href="#" data-toggle="modal" data-target="#addUserModal">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Pengguna</span>
            </a>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width='10px'>No</th>
                            <th>ID Asisten</th>
                            <th>Jabatan</th>
                            <th>Nama Lengkap</th>
                            <th>username</th>
                            <th width='150px'>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>ID Asisten</th>
                            <th>Jabatan</th>
                            <th>Nama Lengkap</th>
                            <th>username</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                           <td style="text-align: center">{{ $loop->iteration }}</td>
                           <td>{{ $user->assistant_id }}</td>
                           <td>{{ $user->role }}</td>
                           <td>{{ $user->name }}</td>
                           <td>{{ $user->username }}</td>
                           <td>
                                <a href="{{ route('edit.user', ['id' => $user->assistant_id]) }}" class="btn btn-white border py-1 px-3">
                                    Edit
                                </a>
                                <form action="{{ route('delete.user', ['id' => $user->id]) }}" method="POST" style="display: inline;">
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('store.user') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user"
                            placeholder="Masukkan ID Asisten" value="{{ old('assistant_id') }}" name="assistant_id">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user"
                                placeholder="Masukkan Nama Lengkap..." value="{{ old('name') }}" name="name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user"
                                placeholder="Masukkan Username..." value="{{ old('username') }}" name="username">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user"
                                placeholder="Masukkan Password..." name="password">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user"
                                placeholder="Masukkan Konfirmasi Password..." name="password_confirmation">
                        </div>
                        <div class="form-group">
                            <select class="form-control form-control-user" name="role">
                                <option value="">Pilih Role..</option>
                                <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                                <option value="Staff" {{ old('role') == 'Staff' ? 'selected' : '' }}>Staff</option>
                                <option value="PJ" {{ old('role') == 'PJ' ? 'selected' : '' }}>Penanggung Jawab (PJ)</option>
                                <option value="Asisten" {{ old('role') == 'Asisten' ? 'selected' : '' }}>Asisten</option>
                                <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                            </select>
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