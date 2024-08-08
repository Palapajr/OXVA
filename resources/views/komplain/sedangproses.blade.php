@extends('layout.main')

@section('csslibrary')
    <link rel="stylesheet" href="/assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet" href="/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/modules/izitoast/css/iziToast.min.css">
    <link rel="stylesheet" href="/assets/modules/prism/prism.css">
@endsection

@section('title', 'Sedang Proses')

@section('content')
    <div class="section-header">
        <h1>@yield('title')</h1>
        <div class="section-header-breadcrumb">

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
                                        <th>Tombol Proses</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($complaints as $item)
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
                                            <td>
                                                <form action="{{ route('komplain.updateSelesai', $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button class="btn btn-icon icon-left btn-success">Selesai di
                                                        Kerjakan</button>
                                                </form>
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
