@extends('layouts.main')
@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <span class="">Check-in & Check-out</span>
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
                            <select class="form-control form-control-user" name="material">
                                <option value="">Pilih Materi yang diajar..</option>
                                @foreach ($materials as $material)
                                    <option value="{{ $material->id }}">{{ $material->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kelas</label>
                            <select class="form-control form-control-user" name="class">
                                <option value="">Pilih Kelas yang diajar..</option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->class }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Berperan sebagai</label>
                            <select class="form-control form-control-user" name="teaching_role">
                                <option value="">Bertugas sebagai..</option>
                                <option value="Tutor">Tutor</option>
                                <option value="Observer">Observer</option>
                                <option value="Jaga Meja">Jaga Meja</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kode Absen</label>
                            <input type="text" class="form-control form-control-user" placeholder="Masukkan Kode Absen..." name="code">
                        </div>
                        @if (!$isCheckIn)
                            <button type="submit" class="btn btn-primary btn-user px-4 py-2 me-auto">
                                Check In
                            </button>
                        @else
                            <a href="{{ route('check.out') }}" class="btn btn-primary btn-user px-4 py-2 me-auto">
                                Check Out
                            </a>
                        @endif
                    </form>
                    
                </div>
            </div>
        </div>
        
        <div class="col-6">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <span class="">Info</span>
                </div>
                <div class="card-body">
                    <h1>Selamat Datang {{ $user->name }} - {{ $user->role }}</h1>
                    <h2 id="clock"></h2>
                    <br>
                    <p class="bg-danger text-white p-1 rounded d-inline">*untuk kode absen silahkan minta ke PJ , Admin dan Staff</p>
                </div>
            </div>
        </div>
                        
    </div>
</div>
<script>
    function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('clock').innerHTML ="Waktu Sekarang : "+ h + ":" + m + ":" + s;
        var t = setTimeout(startTime, 1000);
    }
    
    function checkTime(i) {
        if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
        return i;
    }
    
    // Start the clock when the page is loaded
    window.onload = function() {
        startTime();
    };
</script>
    
@endsection