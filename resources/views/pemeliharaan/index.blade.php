@extends('layout.main')

@section('csslibrary')
    <link rel="stylesheet" href="/assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet" href="/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/modules/izitoast/css/iziToast.min.css">
    <link rel="stylesheet" href="/assets/modules/prism/prism.css">
@endsection

@section('title', 'Data Pemeliharaan')

@section('content')
    <div class="section-header">
        <h1>@yield('title')</h1>
        <div class="section-header-breadcrumb">
            <button class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#tambah"><i
                    class="fa fa-solid fa-plus"></i>
                Tambah Data
            </button>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr class="text-center">
                                        <th>Nama Barang</th>
                                        <th>Tgl Perbaikan</th>
                                        <th>Waktu Perbaikan</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr class="text-center">
                                            <td>{{ $item->barang->nama_barang }}</td>
                                            <td>{{ date('d-m-Y', strtotime($item->tgl_perbaikan)) }}</td>
                                            <td>{{ date('H:i', strtotime($item->jam_perbaikan)) }}</td>
                                            <td>
                                                @if ($item->status === 'Closed')
                                                    <div class="badge badge-success">Closed</div>
                                                @elseif ($item->status === 'Waiting')
                                                    <div class="badge badge-warning">Waiting</div>
                                                    {{-- @elseif ($item->kondisi === 'Tidak Layak')
                                                    <div class="badge badge-danger">Tidak Layak Pakai</div> --}}
                                                @else
                                                    <p>Status tidak diketahui</p>
                                                @endif
                                            </td>
                                            {{-- <td>{{ $item->jabatan->nama_jabatan }}</td> --}}
                                            <td>
                                                {{-- <a href="{{ route('pegawai.show', $item->id) }}" class="btn btn-icon btn-info"><i class="fa fa-solid fa-eye"></i></a> --}}
                                                <button class="btn btn-icon btn-info" data-toggle="modal"
                                                    data-target="#detail{{ $item->id }}"><i
                                                        class="fa fa-solid fa-eye"></i></button>
                                                <a href="{{ route('barang.edit', $item->id) }}"
                                                    class="btn btn-icon btn-warning"><i
                                                        class="fa fa-regular fa-pen"></i></a>
                                                <button class="btn btn-icon btn-danger" data-toggle="modal"
                                                    data-target="#hapus{{ $item->id }}"><i
                                                        class="fa fa-solid fa-trash"></i></button>
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

    <!-- Modal Tambah-->
    <div class="modal fade" tabindex="-1" role="dialog" id="tambah">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah data Pemeliharaaan
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('pemeliharaan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <select name="barang_id" class="form-control @error('barang_id') is-invalid @enderror"
                                    value="{{ old('barang_id') }}">
                                    <option>Silakan pilih</option>
                                    @foreach ($barang as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('barang_id', isset($data) ? $data->barang_id : '') == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama_barang }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('barang_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end Modal Tambah-->


    @foreach ($data as $item)
        <!-- Modal Hapus-->
        <div class="modal fade" id="hapus{{ $item->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Confirmation</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin menghapus data -> <b>{{ $item->nama_barang }} ?</b> </p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <form action="{{ route('barang.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Delete Data</button>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- end Modal Hapus-->
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
        $("#table-1").dataTable({
            "columnDefs": [{
                "sortable": false,
                "targets": [2, 3]
            }]
        });
    </script>
@stop
