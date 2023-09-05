@extends('templates.default')
@section('title', 'Pasien')
@section('content')
    <div class="col-lg-12 ">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-vcenter card-table ">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>No. Reg</th>
                            <th>No. Rekam Medis</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach($pendaftarans as $pendaftaran)
                        <tr>
                            <td class="text-secondary">
                                {{ $loop->iteration }}
                            </td>
                            <td class="text-secondary">
                                {{ $pendaftaran->no_reg }}
                            </td>
                            <td class="text-secondary">
                                {{ $pendaftaran->no_rm }}
                            </td> --}}
                            <td class="text-secondary">
                                {{ $pendaftaran->dataPasien->Nama_lengkap }}
                            </td>
                            {{-- <td class="text-secondary">
                                {{ $pendaftaran->dataPasien->Nama_lengkap }}
                            </td>
                             <td class="text-secondary">
                                {{ $pendaftaran->dataPasien->Nama_lengkap }}
                            </td>
                            <td class="text-secondary">
                                {{ $pendaftaran->dataPasien->Nama_lengkap }}
                            </td>
                           --}}
                            @if(Auth::user()->role == 'dokter')
                            @else
                            <td>
                                <a href="/pendaftaran/{{$pendaftaran->no_reg}}/edit" class="btn btn-primary">Edit</a>
                                <form action="/pendaftaran/{{$pendaftaran->no_reg}}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
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

