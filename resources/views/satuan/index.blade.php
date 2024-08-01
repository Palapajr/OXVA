@extends('layout.main')

@section('csslibrary')
    <link rel="stylesheet" href="/assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet" href="/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/modules/izitoast/css/iziToast.min.css">
    <link rel="stylesheet" href="/assets/modules/prism/prism.css">
@endsection

@section('title', 'List Satuan')

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

                            <table class="table table-striped" id="satuan">
                                <thead>
                                    <tr class="text-center">
                                        <th>Nama Satuan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr class="text-center">
                                            <td>{{ $item->nama_satuan }}</td>
                                            <td>
                                                <button data-toggle="modal" data-target="#edit{{ $item->id }}"
                                                    class="btn btn-icon btn-warning"><i
                                                        class="fa fa-regular fa-pen"></i></button>
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
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Master Satuan
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('satuan.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Satuan</label>
                                <input type="text" class="form-control @error('nama_satuan') is-invalid @enderror"
                                    value="{{ old('nama_satuan') }}" name="nama_satuan" required>
                                @error('nama_satuan')
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
        <!-- Modal Edit-->
        <div class="modal fade" tabindex="-1" role="dialog" id="edit{{ $item->id }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Master Satuan
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('satuan.update', $item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Jabatan</label>
                                    <input type="text" class="form-control @error('nama_satuan') is-invalid @enderror"
                                        value="{{ old('nama_satuan', $item->nama_satuan) }}" name="nama_satuan" required>
                                    @error('nama_satuan')
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
        <!-- end Modal Edit-->

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
                        <p>Apakah anda yakin menghapus data -> <b>{{ $item->nama_satuan }} ?</b> </p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <form action="{{ route('satuan.destroy', $item->id) }}" method="POST">
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
        $("#satuan").dataTable({
            "columnDefs": [{
                "sortable": false,
            }]
        });
    </script>
@stop
