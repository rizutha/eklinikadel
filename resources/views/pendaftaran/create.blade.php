@extends('templates.default')
@section('title', 'Create Data Pasien')

@section('content')
<div class="row col-lg-12">  
    <div class="card col-lg-12">
        <div class="card-body">
            <form action="/pendaftaran/store" method="POST">
                @csrf
                    <div class="mb-3">
                        <label for="no_rm" class="form-label">No. Rekam Medis</label>
                        <select name="no_rm" class="form-control">
                            @foreach($dataPasiens as $dataPasien)
                            <option value="{{ $dataPasien->no_rm }}"> {{ $dataPasien->no_rm }} - {{ $dataPasien->Nama_lengkap }}</option>
                            @endforeach
                        </select>
                    </div>
                <div class="my-5">
                    <input type="submit" value="Simpan" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>      
@endsection