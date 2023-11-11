@extends('templates.default')
@section('title', 'Pendaftaran Pasien')
@section('content')
<div class="row">
    <div class="col-sm-6 mb-3 mb-sm-0">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Data Pasien</h5>
          <p class="card-text">Jumlah keseluruhan data : .</p>
          <a href="/data_pasien" class="btn btn-primary">Data Pasien</a>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Pendaftaran</h5>
          <p class="card-text">Jumlah keseluruhan data : .</p>
          <a href="/pendaftaran" class="btn btn-primary">Daftarkan</a>
        </div>
      </div>
    </div>
  </div>
@endsection
