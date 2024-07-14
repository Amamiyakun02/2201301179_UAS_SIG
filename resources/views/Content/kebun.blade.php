@extends('layouts.index')

@section('content')
    <h4 class="card-title">Data Perkebunan</h4>
    <div class="table-responsive">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Luas</th>
                    <th scope="col">Jenis Perkebunan</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            @php $no = 1; @endphp
            @foreach($kebun as $row)
                <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->lokasi }}</td>
                    <td>{{ $row->deskripsi }}</td>
                    <td>{{ $row->luas }} Hektar</td>
                    <td>{{ $row->jenisPerkebunan->nama }}</td>
                    <td></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
