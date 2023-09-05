@extends('templates.default')
@section('title', 'Create Data Pasien')

@section('content')
<div class="row col-lg-12">  
    <div class="card col-lg-12">
        <div class="card-body">
            <form action="/data_pasien/{{ $dataPasien->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="Nama_lengkap" class="form-label">No RM</label>
                    <input type="text" disabled class="form-control" value="{{ $dataPasien->no_rm }}">
                </div>
                <div class="mb-3">
                    <label for="Nama_lengkap" class="form-label">Nama Lengkap</label>
                    <input type="text" name="Nama_lengkap" class="form-control" value="{{ $dataPasien->Nama_lengkap }}">
                </div>
                <div class="mb-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" name="nik" class="form-control" value="{{ $dataPasien->nik }}">
                </div>
                <div class="mb-3">
                    <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control" value="{{ $dataPasien->tgl_lahir }}">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="{{ $dataPasien->alamat }}">
                </div>
                <div class="mb-3">
                    <label for="kecamatan" class="form-label">Kecamatan</label>
                    <input type="text" name="kecamatan" class="form-control" value="{{ $dataPasien->kecamatan }}">
                </div>
                <div class="mb-3">
                    <label for="kabupaten" class="form-label">Kabupaten</label>
                    <input type="text" name="kabupaten" class="form-control" value="{{ $dataPasien->kabupaten }}">
                </div>
                <div class="mb-3">
                    <label for="tanggal_terakhir_periksa" class="form-label">Tanggal Terakhir Periksa</label>
                    <input type="date" name="tanggal_terakhir_periksa" class="form-control" value="{{ $dataPasien->tanggal_terakhir_periksa }}">
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <input type="text" name="status" class="form-control" value="{{ $dataPasien->status }}">
                </div>
                <div class="my-5">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>  
        </div>
    </div>
</div>      
@endsection