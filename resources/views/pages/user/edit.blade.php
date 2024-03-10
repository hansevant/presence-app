@extends('layouts.main')
@section('content')

<div class="container-fluid">

    <div class="card">
        <div class="card-body">
            <form action="{{ route('update.user', ['id' => $data->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="assistant_id">ID Asisten</label>
                            <input type="text" class="form-control" id="assistant_id" name="assistant_id" value="{{ $data->assistant_id }}">
                        </div>
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="{{ $data->username }}">
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-control" id="role" name="role">
                                <option value="">Pilih Role..</option>
                                <option value="Admin" {{ $data->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                                <option value="Staff" {{ $data->role == 'Staff' ? 'selected' : '' }}>Staff</option>
                                <option value="PJ" {{ $data->role == 'PJ' ? 'selected' : '' }}>Penanggung Jawab (PJ)</option>
                                <option value="Asisten" {{ $data->role == 'Asisten' ? 'selected' : '' }}>Asisten</option>
                                <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="old_password">Password Lama</label>
                            <input type="password" class="form-control" id="old_password" name="old_password">
                        </div>
                        <div class="form-group">
                            <label for="password">Password Baru</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control" id="confirm_password" name="password_confirmation">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
            
            
        </div>
    </div>

</div>
    
@endsection