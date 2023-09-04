@extends('templates.default')
@section('title', 'Pasien')
@if(Auth::user()->role == 'dokter')
@else
@push('page-action')
    <a href="{{ route ('pasien.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
@endpush
@endif
@section('content')
    <div class="col-lg-12 ">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-vcenter card-table ">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>RM</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th class="w-1"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pasiens as $pasien)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="text-secondary">
                                {{ $pasien->no_rm }}
                            </td>
                            <td class="text-secondary">
                                {{ $pasien->nama }}
                            </td>
                            <td class="text-secondary">
                                {{ $pasien->alamat }}
                            </td>
                            <td class="text-secondary">
                                {{ $pasien->nomor_telp }}
                            </td>
                            @if(Auth::user()->role == 'dokter')
                            @else
                            <td>
                                <div class="row">
                                    <a href="{{ route('pasien.edit', $pasien->id) }}" class="col btn btn-secondary">Edit</a>
                                    <form action="{{ route('pasien.destroy', $pasien->id) }}" method="post" class="col">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Hapus" class="btn btn-danger">
                                    </form>
                                </div>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

