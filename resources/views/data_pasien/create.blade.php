@extends('templates.default')
@section('title', 'Create Data Pasien')

@section('content')
<div class="row col-lg-12">  
    <div class="card col-lg-12">
        <div class="card-body">
            <form action="/data_pasien/store" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="Nama_lengkap" class="form-label">Nama Lengkap</label>
                    <input type="text" name="Nama_lengkap" class="form-control" placeholder="Masukkan Nama Lengkap">
                </div>
                <div class="mb-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" name="nik" class="form-control" placeholder="Masukkan NIK">
                </div>
                <div class="mb-3">
                    <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat">
                </div>
                <div class="mb-3">
                    <label for="kecamatan" class="form-label">Kecamatan</label>
                    <input type="text" name="kecamatan" class="form-control" placeholder="Masukkan Kecamatan">
                </div>
                <div class="mb-3">
                    <label for="kabupaten" class="form-label">Kabupaten</label>
                    <input type="text" name="kabupaten" class="form-control" placeholder="Masukkan Kabupaten">
                </div>
                <div class="mb-3">
                    <label for="tanggal_terakhir_periksa" class="form-label">Tanggal Terakhir Periksa</label>
                    <input type="date" name="tanggal_terakhir_periksa" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <input type="text" name="status" class="form-control" placeholder="Masukkan Status">
                </div>
                <div class="my-5">
                    <input type="submit" value="Simpan" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>      
@endsection