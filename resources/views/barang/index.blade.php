@extends('layout.main')

@section('csslibrary')
    <link rel="stylesheet" href="/assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet" href="/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/modules/izitoast/css/iziToast.min.css">
    <link rel="stylesheet" href="/assets/modules/prism/prism.css">
@endsection

@section('title', 'Data Barang')

@section('content')
    <div class="section-header">
        <h1>@yield('title')</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('barang.create') }}" class="btn btn-icon icon-left btn-primary"><i
                    class="fa fa-solid fa-plus"></i>
                Tambah Data
            </a>
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
                                        <th>Foto</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Type</th>
                                        <th>Kondisi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr class="text-center">
                                            <td>
                                                <img src="{{ asset('/storage/barang/' . $item->foto) }}" class="rounded"
                                                    style="width: 80px">
                                                {{-- <img src="{{ asset('images') . '/' . $item->foto }}" width="50" height="50"> --}}
                                            </td>
                                            <td>{{ $item->nama_barang }}</td>
                                            <td>{{ $item->type }}</td>
                                            <td>{{ $item->kondisi }}</td>
                                            {{-- <td>{{ $item->jabatan->nama_jabatan }}</td> --}}
                                            <td>
                                                {{-- <a href="{{ route('pegawai.show', $item->id) }}" class="btn btn-icon btn-info"><i class="fa fa-solid fa-eye"></i></a> --}}
                                                <button class="btn btn-icon btn-info" data-toggle="modal"
                                                    data-target="#detail{{ $item->id }}"><i
                                                        class="fa fa-solid fa-eye"></i></button>
                                                <a href="{{ route('pegawai.edit', $item->id) }}"
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
    @foreach ($data as $item)
        <!-- Modal detail-->
        <div class="modal fade" tabindex="-1" role="dialog" id="detail{{ $item->id }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail data Saudara <strong class="text-info">{{ $item->nama }}</strong>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-sm">
                            <thead>
                                <div class="text-center">
                                    <img src="{{ asset('/storage/pegawai/' . $item->foto) }}" class="rounded mb-3"
                                        style="width: 250px; height: 350px; border-radius: 100%; border: 2px solid #000000;">
                                </div>
                                <tr>
                                    <th scope="col">NPK</th>
                                    <th scope="row"><strong>{{ $item->npk }}</strong></th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="row"><strong>{{ $item->nama }}</strong></th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th scope="col">Tanggal Lahir</th>
                                    <th scope="row">
                                        <strong>{{ date('d-M-Y', strtotime($item->tanggal_lahir)) }}</strong>
                                    </th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="row"><strong>{{ $item->jenis_kelamin }}</strong></th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th scope="col">No HP</th>
                                    <th scope="row"><strong>{{ $item->nohp }}</strong></th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th scope="col">Jabatan</th>
                                    {{-- <th scope="row"><strong>{{ $item->jabatan->nama_jabatan }}</strong></th> --}}
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th scope="col">TMT</th>
                                    <th scope="row">
                                        <strong>{{ date('d-M-Y', strtotime($item->tmt)) }}</strong>
                                    </th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- end Modal detail-->

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
                        <p>Apakah anda yakin menghapus data -> <b>{{ $item->nama }} ?</b> </p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <form action="{{ route('pegawai.destroy', $item->id) }}" method="POST">
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
