{{-- Pertemuan 3: tampil data dokter (read) | Pertemuan 5: paginate --}}
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ $judul }}
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kode Dokter</th>
                                <th>Nama Dokter</th>
                                <th>Spesialis</th>
                                <th>Nomor Hp</th>
                                <th>Created</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dokter as $a)
                            <tr>
                                <td>{{ $a->id }}</td>
                                <td>{{ $a->kode_dokter }}</td>
                                <td>{{ $a->nama_dokter }}</td>
                                <td>{{ $a->spesialis }}</td>
                                <td>{{ $a->nomor_hp }}</td>
                                <td>{{ $a->created_at }}</td>
                                <td> edit</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{-- Pertemuan 5: tombol halaman 1 2 3 ... --}}
                    {{ $dokter->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
