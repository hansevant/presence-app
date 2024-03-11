@extends('layouts.main')
@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('update.material', ['id' => $data->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Nama Materi</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
    
@endsection