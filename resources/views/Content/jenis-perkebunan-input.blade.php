@extends('layouts.index')

@section('content')
    <div class="container mt-5">
        <h2>Tambah Jenis Perkebunan</h2>
        <form action="{{ route('jenis_perkebunan.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="hex_warna">Hex Warna:</label>
                <input type="text" class="form-control" id="hex_warna" name="hex_warna" required>
            </div>
            <div class="form-group">
            <label for="id_icon">Icon:</label>
                <select class="form-control" id="id_icon" name="id_icon" required>
                    <option value="">Pilih Icon</option>
                    @foreach($icons as $icon)
                        <option value="{{ $icon->id }}">{{ $icon->nama }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
@endsection
