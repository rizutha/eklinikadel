@extends('templates.default')
@section('title', 'Pasien')
@section('content')
    <div class="col-lg-12 ">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-vcenter card-table ">
                    <thead>
                        <tr>
                            <th>No. Rm</th>
                            <th>Nama lengkap</th>
                            <th>Nik</th>
                            <th>ygl lahir</th>
                            <th>umur</th>
                            <th>alamat</th>
                            <th>kabupaten</th>
                            <th>tanggal periksa</th>
                            <th>status</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            <td class="text-secondary">
                                {{ $detail->dataPasien->no_rm }}
                            </td>
                            <td class="text-secondary">
                                {{ $detail->dataPasien->Nama_lengkap }}
                            </td>
                            <td class="text-secondary">
                                {{ $detail->dataPasien->nik }}
                            </td>
                            <td class="text-secondary">
                                {{ $detail->dataPasien->tgl_lahir }}
                            </td>
                            <td class="text-secondary">
                                {{ $detail->dataPasien->umur }}
                            </td>
                            <td class="text-secondary">
                                {{ $detail->dataPasien->alamat }}
                            </td>
                            <td class="text-secondary">
                                {{ $detail->dataPasien->kabupaten }}
                            </td>
                            <td class="text-secondary">
                                {{ $detail->dataPasien->tanggal_terakhir_periksa }}
                            </td>
                            <td class="text-secondary">
                                {{ $detail->dataPasien->status }}
                            </td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

