@extends('layouts.main')
@section('content')
@push('css')
    <link href="{{ ('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

 <!-- Load Bootstrap CSS -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
 <!-- Load DataTables CSS -->
 <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap4.css">
 <!-- Load DataTables Buttons CSS -->
 <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.bootstrap4.css">

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Report Absen</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 14px">
                    <thead>
                        <tr>
                            <th width='20px'>No</th>
                            <th>Nama</th>
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
                            <th>Nama</th>
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
                           <td>{{ $presence->user->name }}</td>
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
    {{-- <script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/demo/datatables-demo.js') }}"></script> --}}
@endpush

<script src=""></script>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap4.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.bootstrap4.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.colVis.min.js"></script>

<script>
new DataTable('#dataTable', {
    layout: {
        topStart: {
            buttons: [
                {
                    extend: 'excel',
                    text: 'Report to Excel',
                    filename: 'Report Absen'
                },
                'colvis'
            ]
        }
    }
});
</script>


@endsection