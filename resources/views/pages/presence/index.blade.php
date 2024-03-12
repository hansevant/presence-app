@extends('layouts.main')
@section('content')

<div class="container-fluid pb-4">

    <div class="row">
        <div class="col-5">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <span class="font-weight-bold">Check-in & Check-out</span>
                </div>
                <div class="card-body">
                    <form action="{{ route('check.in') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>ID Asisten</label>
                            <input type="text" class="form-control form-control-user" value="{{ $user->assistant_id }}" name="assistant_id" disabled>
                        </div>
                        <div class="form-group">
                            <label>Materi</label>
                            <select class="form-control form-control-user" name="material" {{ $isCheckIn ? 'disabled' : '' }}>
                                <option value="">Pilih Materi yang diajar..</option>
                                @foreach ($materials as $material)
                                    <option value="{{ $material->id }}">{{ $material->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kelas</label>
                            <select class="form-control form-control-user" name="class" {{ $isCheckIn ? 'disabled' : '' }}>
                                <option value="">Pilih Kelas yang diajar..</option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->class }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Berperan sebagai</label>
                            <select class="form-control form-control-user" name="teaching_role" {{ $isCheckIn ? 'disabled' : '' }}>
                                <option value="">Bertugas sebagai..</option>
                                <option value="Tutor">Tutor</option>
                                <option value="Observer">Observer</option>
                                <option value="Jaga Meja">Jaga Meja</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kode Absen</label>
                            <input type="text" class="form-control form-control-user" placeholder="Masukkan Kode Absen..." name="code" {{ $isCheckIn ? 'disabled' : '' }}>
                        </div>
                        @if (!$isCheckIn)
                            <button type="submit" class="btn btn-success btn-block btn-user px-4 py-2 me-auto">
                                Check In
                            </button>
                        @else
                            <a href="{{ route('check.out') }}" class="btn btn-danger btn-block btn-user px-4 py-2 me-auto">
                                Check Out
                            </a>
                        @endif
                    </form>
                    
                </div>
            </div>
        </div>
        
        <div class="col-7">
            <div class="card">
                <div class="card-header bg-warning text-white">
                    <span class="font-weight-bold">Informasi</span>
                </div>
                <div class="card-body">
                    <h1>Selamat Datang {{ $user->name }} - {{ $user->role }}</h1>
                    <h2 id="clock" class="mb-3"></h2>
                    @if(Auth::user()->role !== 'Asisten')
                        <form action="{{ route('store.code') }}" method="POST" style="display: inline;">
                            @csrf
                            <button class="btn btn-outline-dark btn-icon-split mb-1 bg-gray-500">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Buat Kode Absen</span>
                            </button>
                        </form>
                    @endif
                    <span class="bg-info text-white p-2 mt-2 rounded">*untuk kode absen silahkan minta ke PJ , Admin dan Staff</span>
                </div>
            </div>
        </div>
                        
    </div>
</div>
<script>
    function startTime() {
        var options = {
            timeZone: 'Asia/Jakarta',
            hour12: false,
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            hour: 'numeric',
            minute: 'numeric',
            second: 'numeric'
        };
        var today = new Date().toLocaleString('id-ID', options);
        document.getElementById('clock').innerHTML = today;
        var t = setTimeout(startTime, 1000);
    }

    window.onload = function() {
        startTime();
    };
</script>
    
@endsection