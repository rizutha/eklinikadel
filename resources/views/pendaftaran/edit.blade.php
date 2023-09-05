@extends('templates.default')
@section('title', 'Edit Pendaftaran')
@section('content')
<div class="row col-lg-12">  
    <div class="card col-lg-12">
        <div class="card-body">
            <form action="/pendaftaran/{{ $pendaftarans->no_reg }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="no_rm" class="form-label">No. Rekam Medis</label>
                    <select name="no_rm" class="form-control">
                        @foreach($dataPasiens as $dataPasien)
                            <option value="{{ $dataPasien->no_rm }}" {{ $dataPasien->no_rm == $pendaftarans->no_rm ? 'selected' : '' }}>
                                {{ $dataPasien->no_rm }} - {{ $dataPasien->Nama_lengkap }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="my-5">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection