@extends('templates.default')
@section('title', 'Create Pasien')

@section('content')
<div class="row col-lg-12">  
    <div class="card col-lg-12">
        <div class="card-body">
            <form action="{{ route('pasien.create') }}" class="" method=post>
            @csrf
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" name="example-text-input" placeholder="Masukan Nama">
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <input type="text" name="alamat" class="form-control" name="example-text-input" placeholder="Masukan Alamat">
                </div>
                <div class="mb-3">
                    <label class="form-label">Nomor Telepon</label>
                    <input type="text" name="nomor_telp" class="form-control" name="example-text-input" placeholder="Masukan No Telepon">
                </div>

                <div class="my-5">
                    <input type="submit" value="Simpan" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>      
@endsection