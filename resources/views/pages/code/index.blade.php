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
            <form action="{{ route('store.code') }}" method="POST" style="display: inline;">
                @csrf
                <button class="btn btn-primary btn-icon-split mb-3">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Buat Kode Absen</span>
                </button>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width='30px'>No</th>
                            <th width='90px'>Kode</th>
                            <th>Dibuat Oleh</th>
                            <th>Digunakan Oleh</th>
                            <th width='170px'>Waktu Dibuat</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Dibuat Oleh</th>
                            <th>Digunakan Oleh</th>
                            <th>Waktu Dibuat</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($codes as $code)
                        <tr>
                            <td style="text-align: center">{{ $loop->iteration }}</td>
                            <td>{{ $code->code }}</td>
                            <td>{{ $code->maker->name }}</td>
                             <td>{!! $code->used?->name !== null ? $code->used->name : "<span class='text-success'>Belum digunakan</span>" !!}</td>
                             <td>{{ $code->created_at->format('d-m-Y H:i:s') }}</td>
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