@extends('layout.main')

@section('csslibrary')
    <link rel="stylesheet" href="/assets/modules/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css">

@stop

@section('title', 'Show Data ')

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
                    <div class="row mt-sm-4">
                        <div class="col-12 col-md-12 col-lg-5">
                          <div class="card profile-widget">
                            <div class="profile-widget-header">
                              <img alt="image" src="{{ asset('/storage/pegawai/'. $data->foto) }}" class="rounded profile-widget-picture">
                              <div class="profile-widget-items">
                                <div class="profile-widget-item">
                                  <div class="profile-widget-item-label">Posts</div>
                                  <div class="profile-widget-item-value">187</div>
                                </div>
                                <div class="profile-widget-item">
                                  <div class="profile-widget-item-label">Followers</div>
                                  <div class="profile-widget-item-value">6,8K</div>
                                </div>
                                <div class="profile-widget-item">
                                  <div class="profile-widget-item-label">Following</div>
                                  <div class="profile-widget-item-value">2,1K</div>
                                </div>
                              </div>
                            </div>
                            <div class="profile-widget-description">
                              <div class="profile-widget-name">Ujang Maman <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> Web Developer</div></div>
                              Ujang maman is a superhero name in <b>Indonesia</b>, especially in my family. He is not a fictional character but an original hero in my family, a hero for his children and for his wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John Doe'</b>.
                            </div>
                            <div class="card-footer text-center">
                              <div class="font-weight-bold mb-2">Follow Ujang On</div>
                              <a href="#" class="btn btn-social-icon btn-facebook mr-1">
                                <i class="fab fa-facebook-f"></i>
                              </a>
                              <a href="#" class="btn btn-social-icon btn-twitter mr-1">
                                <i class="fab fa-twitter"></i>
                              </a>
                              <a href="#" class="btn btn-social-icon btn-github mr-1">
                                <i class="fab fa-github"></i>
                              </a>
                              <a href="#" class="btn btn-social-icon btn-instagram">
                                <i class="fab fa-instagram"></i>
                              </a>
                            </div>
                          </div>
                        </div>
                    <div class="modal-body">
                        <form action="{{ route('pegawai.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>NPK</label>
                                    <input type="text" class="form-control @error('npk') is-invalid @enderror"
                                        value="{{ old('npk') }}" name="npk">
                                    @error('npk')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Nama Pegawai</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        value="{{ old('nama') }}" name="nama">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    {{-- <input type="text" class="form-control datepicker" name="tanggal_lahir"> --}}
                                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                        value="{{ old('tanggal_lahir') }}" name="tanggal_lahir">
                                    @error('tanggal_lahir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                        name="jenis_kelamin">
                                        <option>Silakan pilih</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Nomor Hp</label>
                                    <input type="text" class="form-control @error('nohp') is-invalid @enderror"
                                        name="nohp">
                                    @error('nohp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Jabatan</label>
                                    <input type="text" class="form-control @error('jabatan') is-invalid @enderror"
                                        name="jabatan">
                                    @error('jabatan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>TMT</label>
                                    <input type="date" class="form-control @error('tmt') is-invalid @enderror"
                                        name="tmt">
                                    @error('tmt')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>File Foto</label>
                                    {{-- <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" id="image"> --}}
                                    <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                        name="foto" id="image" onchange="previewImage()">
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
                                <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Close</a>
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
