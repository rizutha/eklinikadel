@extends('templates.default')
@section('title', 'Pasien')
@if(Auth::user()->role == 'dokter')
@else
@push('page-action')
    <a href="/data_pasien/create" class="btn btn-primary mb-3">Tambah Data</a>
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
                            <th>NO RM</th>
                            <th>Nama Lengkap</th>
                            <th>NIK</th>
                            <th>Tanggal Lahir</th>
                            <th>Umur</th>
                            <th>Alamat</th>
                            <th>Kecamatan</th>
                            <th>Kabupaten</th>
                            <th>Tanggal Terakhir Periksa</th>
                            <th>Status</th>
                            <th>Dibuat</th>
                            <th class="w-1"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataPasien as $pasien)
                        <tr>
                            <td class="text-secondary">
                                {{ $loop->iteration }}
                            </td>
                            <td class="text-secondary">
                                {{ $pasien->no_rm }}
                            </td>
                            <td class="text-secondary">
                                {{ $pasien->Nama_lengkap}}
                            </td>
                            <td class="text-secondary">
                                {{ $pasien->nik }}
                            </td>
                            <td class="text-secondary">
                                {{ $pasien->tgl_lahir }}
                            </td> <td class="text-secondary">
                                {{ $pasien->umur }}
                            </td> <td class="text-secondary">
                                {{ $pasien->alamat }}
                            </td> <td class="text-secondary">
                                {{ $pasien->kecamatan }}
                            </td> <td class="text-secondary">
                                {{ $pasien->kabupaten }}
                            </td> <td class="text-secondary">
                                {{ $pasien->tanggal_terakhir_periksa }}
                            </td> <td class="text-secondary">
                                {{ $pasien->status }}
                            </td> <td class="text-secondary">
                                {{ \Carbon\Carbon::parse($pasien->created_at)->diffForHumans() }}
                            </td>
                            @if(Auth::user()->role == 'dokter')
                            @else
                            <td>
                                <div class="row">
                                    <a href="/data_pasien/{{$pasien->id}}/edit" class="col btn btn-secondary">Edit</a>
                                    <form action="/data_pasien/{{$pasien->id}}" method="post" class="col">
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

