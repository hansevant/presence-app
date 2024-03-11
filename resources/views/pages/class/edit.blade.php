@extends('layouts.main')
@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('update.class', ['id' => $data->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="class">Nama Kelas</label>
                            <input type="text" class="form-control" id="class" name="class" value="{{ $data->class }}">
                        </div>
                        <div class="form-group">
                            <label for="major">Jurusan</label>
                            <input type="text" class="form-control" id="major" name="major" value="{{ $data->major }}">
                        </div>
                        <div class="form-group">
                            <label for="faculty">Fakultas</label>
                            <input type="text" class="form-control" id="faculty" name="faculty" value="{{ $data->faculty }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
    
@endsection