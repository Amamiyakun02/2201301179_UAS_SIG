@extends('layouts.index')

@section('content')
{{--    <div class="row">--}}
{{--        <div class="col-sm-12 col-md-6">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    <h4 class="card-title">Input With Success</h4>--}}
{{--                    <h6 class="card-subtitle">To use add <code>is-valid</code> class to the input</h6>--}}
{{--                    <form class="mt-3">--}}
{{--                        <div class="mb-3">--}}
{{--                            <label class="form-control-label" for="inputSuccess1">Jenis Perkebunan</label>--}}
{{--                            <input type="text" name="name" class="form-control is-valid" id="inputSuccess1">--}}
{{--                            <div class="valid-feedback">--}}
{{--                                Success! You've done it.--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="mb-3">--}}
{{--                            <label class="form-control-label" for="inputSuccess1">Warna</label>--}}
{{--                            <input type="text" name="color" class="form-control is-valid" id="inputSuccess1">--}}
{{--                            <div class="valid-feedback">--}}
{{--                                Success! You've done it.--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="input-group mb-3">--}}
{{--                            <div class="input-group-prepend">--}}
{{--                                <label class="input-group-text" for="inputGroupSelect01">Marker</label>--}}
{{--                            </div>--}}
{{--                            <select class="custom-select" id="inputGroupSelect01">--}}
{{--                                <option selected>Choose...</option>--}}
{{--                                <option value="1">One</option>--}}
{{--                                <option value="2">Two</option>--}}
{{--                                <option value="3">Three</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="container mt-5">
        <h2>Tambah Icon</h2>
        <form action="{{ route('icon.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="gambar">Gambar Icon:</label>
                <input type="file" class="form-control" id="gambar" name="gambar" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
@endsection
