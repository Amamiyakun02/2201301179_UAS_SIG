@extends('layouts.index')

@section('content')
    <div class="container-fluid">
        <!-- *************************************************************** -->
        <!-- Start First Cards -->
        <!-- *************************************************************** -->
        <div class="card-group">
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                                <h2 class="text-dark mb-1 font-weight-medium">100</h2>
                                </div>
                            <h4 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Perkebunan</h4>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
{{--                                    <span class="opacity-7 text-muted"><i data-feather=""></i></span>--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium">6</h2>
                            <h4 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Jenis Perkebunan
                            </h4>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
{{--                                    <span class="opacity-7 text-muted"><i data-feather="dollar-sign"></i></span>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#full-width-modal">Full width modal</button>

        <!-- *************************************************************** -->
        <!-- End First Cards -->
        <!-- *************************************************************** -->
        <div class="container-fluid">
            <div id="map">
            </div>
        </div>
        <!-- *************************************************************** -->
        <!-- End Top Leader Table -->
    </div>

    <script>
        const pelaihari = [-3.7997999632620463, 114.76122075076779]; //mendefinisikan titik koordinat kota pelahari sebagai titik utama peta
        const map = L.map('map').setView(pelaihari, 16);  // membuat object map dari lefleat dan mengatur titik yang pertama kali dilihat pada map
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {  //menambahkan tile atau sumber gambar peta yaitu dari openstreetmap.org
            maxZoom: 25,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>' //menambahkan copyright dari openstreetmap
        }).addTo(map);
    </script>


@endsection
