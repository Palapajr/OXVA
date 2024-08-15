@extends('layout.main')


@section('title', 'Dashboard')

@section('content')
    <div class="section-header">
        <h1>@yield('title')</h1>
        <div class="section-header-breadcrumb">

        </div>
    </div>

    <div class="section-body">
        <div class="row">

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Pegawai</h4>
                        </div>
                        <div class="card-body">
                            {{ $jml_pegawai }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-layer-group"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Barang</h4>
                        </div>
                        <div class="card-body">
                            {{ $jml_barang }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-dark">
                        <i class="fas fa-wrench"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Pemeliharaan</h4>
                        </div>
                        <div class="card-body">
                            {{ $jml_pemeliharaan }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-body">
        <div class="card col-lg-6">
            <div class="card-header">
                <h4>Total Komplainan</h4>
            </div>
                <div class="card-body">
                    <div class="row pb-2">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-secondary">
                                    <i class="fas fa-comments"></i></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Proses</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ $proses }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-info">
                                    <i class="fas fa-comments"></i></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Sedang Proses</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ $sedangproses }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-success">
                                    <i class="fas fa-comments"></i></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Selesai</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ $selesai }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>


@endsection
