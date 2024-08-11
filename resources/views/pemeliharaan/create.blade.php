@extends('layout.main')

@section('csslibrary')
    <link rel="stylesheet" href="/assets/modules/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css">

@stop

@section('title', 'Tambah Data Pemeliharaan')

@section('content')
    <div class="section-header">
        <h1>@yield('title')</h1>
        <div class="section-header-breadcrumb">

        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>@yield('title')</h4>
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
                                <div class="form-group">
                                    <label>Tanggal Perbaikan</label>
                                    {{-- <input type="text" class="form-control datepicker" name="tanggal_lahir"> --}}
                                    <input type="date" class="form-control @error('tgl_perbaikan') is-invalid @enderror"
                                        value="{{ old('tgl_perbaikan') }}" name="tgl_perbaikan">
                                    @error('tgl_perbaikan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Jam Perbaikan</label>
                                    <input type="time" class="form-control @error('jam_perbaikan') is-invalid @enderror"
                                    value="{{ old('jam_perbaikan') }}" name="jam_perbaikan">
                                @error('jam_perbaikan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label>Lokasi</label>
                                    <select name="lokasi_id" class="form-control @error('lokasi_id') is-invalid @enderror"
                                        value="{{ old('lokasi_id') }}">
                                        <option>Silakan pilih</option>
                                        @foreach ($lokasi as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('lokasi_id', isset($data) ? $data->lokasi_id : '') == $item->id ? 'selected' : '' }}>
                                                {{ $item->nama_lokasi }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('lokasi_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <div>
                                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi">{{{ old('deskripsi') }}}</textarea>
                                        @error('deskripsi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Pegawai</label>
                                    <select name="pegawai_id" class="form-control @error('pegawai_id') is-invalid @enderror"
                                        value="{{ old('pegawai_id') }}">
                                        <option>Silakan pilih</option>
                                        @foreach ($pegawai as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('pegawai_id', isset($data) ? $data->pegawai_id : '') == $item->id ? 'selected' : '' }}>
                                                {{ $item->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('pegawai_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('pemeliharaan.index') }}" class="btn btn-secondary">Close</a>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>


@endsection


@section('jslibrary')
    <script src="/assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- Generet foto data pegawai -->
    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@stop
