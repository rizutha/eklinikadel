@extends('templates.default')

<style></style>

@section('content')
<h1>Pasien</h1>
<div class="col-lg-12">
    <div class="card">
        <div class="table-responsive">
            <table class="table table-vcenter card-table">
                <thead>
                    <tr>
                        <th>No Rekam Medis</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No Telepon</th>
                        <th class="w-1"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pasiens as $pasien)
                    <tr>
                        <td>{{ $pasien->no_rm }}</td>
                        <td class="text-secondary">
                            {{ $pasien->nama }}
                        </td>
                        <td class="text-secondary"><a href="#" class="text-reset">{{ $pasien->alamat }}</a></td>
                        <td class="text-secondary">
                            {{ $pasien->nomor_telp }}
                        </td>
                        <td>
                            <a href="#">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

