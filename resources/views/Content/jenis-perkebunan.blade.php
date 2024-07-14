@extends('layouts.index')

@section('content')
    <h4 class="card-title">Data Perkebunan</h4>
    <div class="table-responsive">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Hwx Warna</th>
                    <th scope="col">Preview</th>
                </tr>
            </thead>
            <tbody>
            @php $no = 1; @endphp
            @foreach($jenis as $row)
                <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->warna }}</td>
                    <td>
                        <div style="background-color:{{ $row->warna }};width: 50px; height: 50px;"></div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
