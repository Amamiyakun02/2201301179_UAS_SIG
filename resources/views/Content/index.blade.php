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
    <!--  Modal content for the above example -->
    <div class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Perkebunan Karet</h4>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">×</button>
                </div>
                 <div class="modal-body">
                    Luas: <span id="modal-luas"></span> hektar<br>
                    ID Jenis: <span id="modal-id-jenis"></span><br>
                    Lokasi: <span id="modal-lokasi"></span><br>
                 </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
    // Ambil semua tombol detail
    var detailButtons = document.querySelectorAll('button[id^="detailButton-"]');

    detailButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            // Ambil data dari atribut data- tombol
            var luas = button.getAttribute('data-luas');
            var idJenis = button.getAttribute('data-id-jenis');
            var lokasi = button.getAttribute('data-lokasi');

            // Perbarui konten modal dengan data yang diambil
            document.getElementById('modal-luas').textContent = luas;
            document.getElementById('modal-id-jenis').textContent = idJenis;
            document.getElementById('modal-lokasi').textContent = lokasi;
        });
    });
});
</script>
@endsection
