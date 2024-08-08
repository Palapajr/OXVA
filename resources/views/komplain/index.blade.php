@extends('layout.main')

@section('csslibrary')
    <link rel="stylesheet" href="/assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet" href="/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/modules/izitoast/css/iziToast.min.css">
    <link rel="stylesheet" href="/assets/modules/prism/prism.css">
@endsection

@section('title', 'List Data Komplainan')

@section('content')
    <div class="section-header">
        <h1>@yield('title')</h1>
        <div class="section-header-breadcrumb">
            {{-- <button class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#tambah"><i
                    class="fa fa-solid fa-plus"></i>
                Tambah Data
            </button> --}}
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table table-striped" id="satuan">
                                <thead>
                                    <tr class="text-center">
                                        <th>Kode Komplain</th>
                                        <th>Nama Pelapor</th>
                                        <th>Bidang</th>
                                        <th>Status Pengerjaan</th>
                                        <th>Lihat Pekerjaan</th>
                                        {{-- <th>Tombol Proses</th>
                                        <th>Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($komplains as $item)
                                        <tr class="text-center">
                                            <td>{{ $item->kode_pelapor }}</td>
                                            <td>{{ $item->nama_pelapor }}</td>
                                            <td>{{ $item->bidang }}</td>
                                            <td>
                                                @if ($item->status_transaksi === 'Proses')
                                                    <div class="badge badge-secondary">Proses</div>
                                                @elseif ($item->status_transaksi === 'Sedang Proses')
                                                    <div class="badge badge-info">Sedang Proses</div>
                                                @elseif ($item->status_transaksi === 'Selesai')
                                                    <div class="badge badge-success">Selesai</div>
                                                @else
                                                    <p>Status tidak diketahui</p>
                                                @endif
                                            </td>
                                            {{-- <td><button class="btn btn-icon icon-left btn-primary">PROSES</button></td> --}}

                                            <td>
                                                <button data-toggle="modal" data-target="#detail{{ $item->id }}"
                                                    class="btn btn-icon btn-info"><i
                                                        class="fa fa-regular fa-eye"></i></button>
                                                {{-- <button class="btn btn-icon btn-danger" data-toggle="modal"
                                                    data-target="#hapus{{ $item->id }}"><i
                                                        class="fa fa-solid fa-trash"></i></button> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection


@section('modal')
    @foreach ($komplains as $item)
        <!-- Modal detail-->
        <div class="modal fade" tabindex="-1" role="dialog" id="detail{{ $item->id }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail data Saudara <strong
                                class="text-info">{{ $item->nama_pelapor }}</strong>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-sm">
                            <thead>
                                <div class="text-center">
                                    <img src="{{ asset('/storage/komplain/' . $item->foto_bukti) }}" class="rounded mb-3"
                                        style="width: 250px; height: 350px; border-radius: 100%; border: 2px solid #000000;">
                                </div>
                                <tr>
                                    <th scope="col">Kode Laporan</th>
                                    <th scope="row"><strong>{{ $item->kode_pelapor }}</strong></th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th scope="col">Nama Pelapor</th>
                                    <th scope="row"><strong>{{ $item->nama_pelapor }}</strong></th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th scope="col">Bidang</th>
                                    <th scope="row"><strong>{{ $item->bidang }}</strong></th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="row"><strong>{{ $item->deskripsi }}</strong></th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th scope="col">Laporan Yang Di tuju</th>

                                    {{-- <th scope="row"><strong>{{ $item->typeKomplain }}</strong></th> --}}
                                    <th scope="row"><strong>
                                            @if ($item->typeKomplain === 'SAR')
                                                <div class="badge badge-warning">SARPRAS</div>
                                            @elseif ($item->typeKomplain === 'IT')
                                                <div class="badge badge-info">UNIT IT</div>
                                            @elseif ($item->typeKomplain === 'ATM')
                                                <div class="badge badge-danger">ATEM</div>
                                            @else
                                                <p>Status tidak diketahui</p>
                                            @endif
                                        </strong>
                                    </th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- end Modal detail-->
    @endforeach
@endsection

@section('jslibrary')
    <script src="/assets/modules/datatables/datatables.min.js"></script>
    <script src="/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
    <script src="/assets/modules/jquery-ui/jquery-ui.min.js"></script>
    <script src="/assets/modules/izitoast/js/iziToast.min.js"></script>
    <script src="/assets/modules/prism/prism.js"></script>
    <script>
        //message with toastr
        @if (session()->has('success'))

            iziToast.success({
                title: '{{ session('success') }}',
                position: 'topRight'
            });

            // iziToast.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))

            iziToast.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>
@stop

@section('datatable')
    <script>
        $("#satuan").dataTable({
            "columnDefs": [{
                "sortable": false,
            }]
        });
    </script>
@stop
