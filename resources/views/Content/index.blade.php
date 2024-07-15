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
                                <h2 class="text-dark mb-1 font-weight-medium">{{ $jumlahKebun }}</h2>
                                </div>
                            <h4 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Perkebunan</h4>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium">{{ $jumlahJenisPerkebunan }}</h2>
                            <h4 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Jenis Perkebunan
                            </h4>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
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
                    <h4 class="modal-title" id="kebunNama"></h4>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <p><strong>Lokasi:</strong> <span id="kebunLokasi"></span></p>
                    <p><strong>Deskripsi:</strong> <span id="kebunDeskripsi"></span></p>
                    <p><strong>Luas:</strong> <span id="kebunLuas"></span> Hektar</p>
                    <p><strong>Jenis:</strong> <span id="kebunJenis"></span></p>
                    <p><strong>Poligon:</strong> <span id="kebunPoligon"></span></p>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
