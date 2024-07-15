@extends('layouts.index')

@section('content')
    <div class="container mt-5">
        <h2>Tambah Kebun</h2>
        <form action="{{ route('kebun.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="lokasi">Lokasi:</label>
                <input type="text" class="form-control" id="lokasi" name="lokasi" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
            </div>
            <div class="form-group">
                <label for="luas">Luas:</label>
                <input type="number" class="form-control" id="luas" name="luas" required>
            </div>
            <div class="form-group">
                <label for="id_jenis">Jenis Perkebunan:</label>
                <select class="form-control" id="id_jenis" name="id_jenis" required>
                    <option value="">Pilih Jenis Perkebunan</option>
                    @foreach($jenisPerkebunan as $jenis)
                        <option value="{{ $jenis->id }}">{{ $jenis->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="poligon">Poligon :</label>
                <textarea class="form-control" id="poligon" name="poligon" placeholder="Contoh: [[30.xxxxxx, 50.xxxxxx], [30.xxxxxx, 50.xxxxxx], [30.xxxxxx, 50.xxxxxx]]" required></textarea>
                <small class="form-text text-muted">
                    Masukkan koordinat poligon dalam format array. Contoh: <br>
                    <code>[[30.15646442, 50.135676421], [30.526587664, 50.46355948], [30.79434974, 50.50618144]]</code> <br>
                    Setiap pasangan koordinat harus diapit oleh tanda kurung siku dan dipisahkan oleh koma.
                </small>
            </div>

            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
@endsection
