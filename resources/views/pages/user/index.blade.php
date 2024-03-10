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
                <span class="text">Add User</span>
            </a>
            <button class="btn btn-outline-dark btn-icon-split mb-3">
                <span class="icon text-white-50">
                    <i class="fas fa-tools"></i>
                </span>
                <span class="text">Filter</span>
            </button>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Role</th>
                            <th>Name</th>
                            <th>username</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Role</th>
                            <th>Name</th>
                            <th>username</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Info Penambahan User</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>untuk pembuatan akun ini hanya menambahkan data data yang dibutuhkan dan password default awalnya adalah <code>password</code>. <br> Lalu jika sudah silahkan login dengan password defaultnya dan ganti passwordnya terlebih dahulu.</p>
                </div>
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
                    <form action="#" method="POST">
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
                                placeholder="Masukkan Konfirmasi Password..." name="confirm_password">
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