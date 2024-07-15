<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
{{--    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">--}}
    <title>{{ $title }}</title>
    <!-- Custom CSS -->
    <link href="{{ asset('assets/extra-libs/c3/c3.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/libs/chartist/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!-- <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script> -->
    <link rel="stylesheet" href="{{ asset('assets/leaflet/leaflet.css') }}"/>
    <script src="{{ asset('assets/leaflet/leaflet.js') }}"></script>

    <style>
        /*mengatur ukuran dari canvas peta*/
        #map{
            height: 100vh;
        }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <!-- Logo icon -->
                        <a href="/">
                            <b class="logo-icon">
                                <!-- Dark Logo icon -->
                                <img src="{{ asset('assets/images/logo-icon.png') }}" alt="homepage" class="dark-logo" />
                                <!-- Light Logo icon -->
                                <img src="../assets/images/logo-icon.png" alt="homepage" class="light-logo" />
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span class="logo-text">
                                <!-- dark Logo text -->
                                <img src="../assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                                <!-- Light Logo text -->
                                <img src="../assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                            </span>
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
            
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        @include('layouts.side')
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item">
                                        <div class="container-fluid">
                                            <h2 class="text-center">Perkebunan di Kabupaten Tanah Laut</h2>
                                        </div>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                @yield('content')
            </div>
{{--             <div id="full-width-modal" class="modal fade" tabindex="-1" role="dialog"--}}
{{--                aria-labelledby="fullWidthModalLabel" aria-hidden="true">--}}
{{--                <div class="modal-dialog modal-full-width">--}}
{{--                    <div class="modal-content">--}}
{{--                        <div id="peta" style="width: 100%; height: 80vh">--}}
{{--                        </div>--}}
{{--                        <div class="modal-footer">--}}
{{--                            <button type="button" class="btn btn-light"--}}
{{--                                data-dismiss="modal">Close</button>--}}
{{--                            <button type="button" class="btn btn-primary">Save changes</button>--}}
{{--                        </div>--}}
{{--                    </div><!-- /.modal-content -->--}}
{{--                </div><!-- /.modal-dialog -->--}}
{{--            </div><!-- /.modal -->--}}
{{--            <!-- ============================================================== -->--}}
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            @include('layouts.footer')
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="{{ asset('js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('js/feather.min.js') }}"></script>
    <script src="{{ asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <!--This page JavaScript -->
    <script src="{{ asset('assets/extra-libs/c3/d3.min.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/c3/c3.min.js') }}"></script>
    <script src="{{ asset('assets/libs/chartist/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('js/pages/dashboards/dashboard1.min.js') }}"></script>


<script>
        // Program Javascript
        const koordinat = [-3.685748128760011, 114.7352782507877]; //mendefinisikan titik koordinat kota pelahari sebagai titik utama peta
        const map = L.map('map').setView(koordinat, 16);  // membuat object map dari lefleat dan mengatur titik yang pertama kali dilihat pada map
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {  //menambahkan tile atau sumber gambar peta yaitu dari openstreetmap.org
            maxZoom: 25,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>' //menambahkan copyright dari openstreetmap
        }).addTo(map);

        function showKebunDetail(id) {
            // Ambil data dari API menggunakan Fetch API
            fetch(`/data/data_kebun/${id}`)
            .then(response => {
                if (!response.ok) {
                throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(kebun => {
                document.getElementById('kebunNama').innerText = kebun.nama;
                document.getElementById('kebunLokasi').innerText = kebun.lokasi;
                document.getElementById('kebunDeskripsi').innerText = kebun.deskripsi;
                document.getElementById('kebunLuas').innerText = kebun.luas;
                document.getElementById('kebunJenis').innerText = kebun.jenis;
                document.getElementById('kebunPoligon').innerText = kebun.poligon;

                // Tampilkan modal
                $('#bs-example-modal-lg').modal('show');
            })
            .catch(error => {
                console.error('Error fetching kebun data:', error);
            });
        }

        fetch('/kebun') //mengambil seluruh dari REST API yang telah di buat
            .then(response => response.json())
            .then(data => {
                // console.log(data);
                // Menambahkan layer GeoJSON ke peta
                L.geoJSON(data, {
                    onEachFeature: function (feature, layer) {
                        console.log(feature);
                        console.log(feature.properties.jenis.warna);
                        // console.log(layer);
                        if (feature.properties && feature.properties.nama) {
                            // Mengikat popup dengan informasi untuk setiap poligon
                            layer.bindPopup(`
                            <h3><strong>${feature.properties.nama}</strong></h3><br>
                            Deskripsi: ${feature.properties.deskripsi}<br>
                            <button type="button" id="detailButton" onclick="showKebunDetail(${feature.properties.id})" class="btn btn-info btn-block waves-effect waves-light btn-sm" data-toggle="modal" data-target="#bs-example-modal-lg" data-luas="${feature.properties.luas}" data-id-jenis="${feature.properties.id_jenis}" data-lokasi="${feature.properties.lokasi}">Lihat Detail</button>
                        `);
                            const customIcon = L.icon({
                                iconUrl: 'icon/default.png',  // Menggunakan icon dari properti
                                iconSize: [32, 32],  // Ukuran icon
                                iconAnchor: [16, 32],  // Titik anchor dari icon
                                popupAnchor: [0, -32]  // Titik popup relatif terhadap icon
                            });
                        }
                    },
                    style: feature => ({
                        color: feature.properties.jenis.warna,
                        weight: 2,
                        opacity: 1,
                        fillOpacity: 0.2
                    })
                }).addTo(map);
            })
            .catch(error => {
                console.error('Terjadi kesalahan saat mengambil data GeoJSON:', error);
            });
    </script>
</body>
</html>
