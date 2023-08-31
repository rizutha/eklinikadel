@extends('templates.default')

@php
    $title = "Data Pasien";
    $preTitle = "Edit";
@endphp

@section('content')
<div class="row col-lg-12">  
    <div class="card col-lg-12">
        <div class="card-body">
            <form action="{{ route('pasien.update', $pasien->id) }}" class="" method=post>
            @csrf
            @method('PUT')
            
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" name="example-text-input" placeholder="Masukan Nama" value="{{ $pasien->nama }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <input type="text" name="alamat" class="form-control" name="example-text-input" placeholder="Masukan Alamat" value="{{ $pasien->alamat }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Nomor Telepon</label>
                    <input type="text" name="nomor_telp" class="form-control" name="example-text-input" placeholder="Masukan No Telepon" value="{{ $pasien->nomor_telp }}">
                </div>

                <div class="my-5">
                    <input type="submit" value="Simpan" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>      
@endsection