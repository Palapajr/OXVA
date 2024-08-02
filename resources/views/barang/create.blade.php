@extends('layout.main')

@section('csslibrary')
    <link rel="stylesheet" href="/assets/modules/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="/assets/modules/summernote/summernote-bs4.css">

@stop

@section('title', 'Tambah Data Barang')

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
                        <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Kode Barang</label>
                                    <input type="text" class="form-control"
                                        value="{{ old('kode_barang') }}" name="kode_barang" readonly disabled placeholder="Kode Otomatis" >
                                </div>
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input type="text" class="form-control @error('nama_barang') is-invalid @enderror"
                                        value="{{ old('nama_barang') }}" name="nama_barang">
                                    @error('nama_barang')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input type="text" class="form-control @error('type') is-invalid @enderror"
                                        value="{{ old('type') }}" name="type">
                                    @error('type')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Beli</label>
                                    {{-- <input type="text" class="form-control datepicker" name="tanggal_lahir"> --}}
                                    <input type="date" class="form-control @error('tgl_beli') is-invalid @enderror"
                                        value="{{ old('tgl_beli') }}" name="tgl_beli">
                                    @error('tgl_beli')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Satuan</label>
                                    <select name="satuan_id" class="form-control @error('satuan_id') is-invalid @enderror"  value="{{ old('satuan_id') }}">
                                        <option>Silakan pilih</option>
                                        @foreach ($satuan as $item)
                                          <option value="{{ $item->id }}"
                                            {{ old('satuan_id', isset($data) ? $data->jabatan_id : '') == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama_satuan }}
                                          </option>
                                        @endforeach
                                    </select>
                                    @error('satuan_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Lokasi</label>
                                    <select name="lokasi_id" class="form-control @error('lokasi_id') is-invalid @enderror"  value="{{ old('lokasi_id') }}">
                                        <option>Silakan pilih</option>
                                        @foreach ($lokasi as $item)
                                          <option value="{{ $item->id }}"
                                            {{ old('lokasi_id', isset($data) ? $data->jabatan_id : '') == $item->id ? 'selected' : '' }}>
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
                                    <label>Jumlah</label>
                                    <input type="text" class="form-control @error('jumlah') is-invalid @enderror"
                                        name="jumlah" value="{{ old('jumlah') }}">
                                    @error('jumlah')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <div>
                                      <textarea class="summernote @error('deskripsi') is-invalid @enderror" name="deskripsi" value="{{ old('deskripsi') }}"></textarea>
                                      @error('deskripsi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Kondisi</label>
                                    <select name="kondisi" class="form-control @error('kondisi') is-invalid @enderror"  value="{{ old('kondisi') }}">
                                        <option>Silakan pilih</option>
                                        <option {{ old('kondisi') == '1' ? 'selected' : '' }} value="1">Bagus</option>
                                        <option {{ old('kondisi') == '2' ? 'selected' : '' }} value="2">Rusak</option>
                                        <option {{ old('kondisi') == '3' ? 'selected' : '' }} value="3">Tidak Layak Pakai</option>
                                    </select>
                                    @error('kondisi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>File Foto</label>
                                    {{-- <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" id="image"> --}}
                                    <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                        name="foto" id="image" value="{{ old('foto') }}"
                                        onchange="previewImage()">
                                    @error('foto')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <img class="img-preview img-fluid" style="width: 150px">
                                    {{-- <img src="" id="showImage" class="img-fluid" width="100px"> --}}
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('barang.index') }}" class="btn btn-secondary">Close</a>
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
    <script src="/assets/modules/summernote/summernote-bs4.js"></script>
@stop
