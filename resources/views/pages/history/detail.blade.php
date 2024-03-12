@extends('layouts.main')
@section('content')
@push('css')
    <link href="{{ ('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><span class="text-dark">Data Riwayat Absen</span> {{ Auth::user()->name }}</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 16px">
                    <thead>
                        <tr>
                            <th width='20px'>No</th>
                            <th>Kelas</th>
                            <th>Materi</th>
                            <th>Peran</th>
                            <th>Tanggal</th>
                            <th>Check-in</th>
                            <th>Check-out</th>
                            <th>Durasi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th width='20px'>No</th>
                            <th>Kelas</th>
                            <th>Materi</th>
                            <th>Peran</th>
                            <th>Tanggal</th>
                            <th>Check-in</th>
                            <th>Check-out</th>
                            <th>Durasi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                       @foreach ($presences as $presence)
                       <tr>
                           <td style="text-align: center">{{ $loop->iteration }}</td>
                           <td>{{ $presence->class->class }}</td>
                           <td>{{ $presence->material->name }}</td>
                           <td>{{ $presence->teaching_role }}</td>
                           <td>{{ \Carbon\Carbon::parse($presence->date)->format('d F Y') }}</td>
                           <td>{{ $presence->start }}</td>
                           <td>{{ $presence->end }}</td>
                           <td>{{ $presence->duration }} menit</td>
                        </tr>
                       @endforeach
                    </tbody>
                </table>
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