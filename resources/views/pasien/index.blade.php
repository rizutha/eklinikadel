@extends('templates.default')

@php
    $title = "Pasien Pendaftaran";
    $preTitle = "Data";
@endphp

@push('page-action')
    <a href="{{ route ('pasien.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
@endpush

@section('content')
    <div class="col-lg-12 ">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-vcenter card-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th class="w-1"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pasiens as $pasien)
                        <tr>
                            <td>{{ $pasien->id }}</td>
                            <td class="text-secondary">
                                {{ $pasien->nama }}
                            </td>
                            <td class="text-secondary">
                                {{ $pasien->alamat }}
                            </td>
                            <td class="text-secondary">
                                {{ $pasien->nomor_telp }}
                            </td>
                            <td>
                                <div class="row">
                                    <a href="{{ route('pasien.edit', $pasien->id) }}" class="col">Edit</a>
                                    <form action="{{ route('pasien.destroy', $pasien->id) }}" method="post" class="col">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Hapus" class="btn btn-danger">
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

