@php $configData = Helper::Custom(); @endphp
@extends('layouts/layoutMasterAdmin')

@section('page-style')
    <link
        href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.0.2/af-2.7.0/b-3.0.1/b-colvis-3.0.1/b-html5-3.0.1/b-print-3.0.1/cr-2.0.0/date-1.5.2/fc-5.0.0/fh-4.0.1/kt-2.12.0/r-3.0.0/rg-1.5.0/rr-1.5.0/sc-2.4.1/sb-1.7.0/sp-2.3.0/sl-2.0.0/sr-1.4.0/datatables.min.css"
        rel="stylesheet">
    <style>
        #clock {
            font-size: 1.5em;
        }

        #time {
            font-size: 2em;
        }

        #myTable_wrapper {
            width: 100vw;
        }
    </style>
@endsection
@section('vendor-style')
    @vite(['resources/assets/vendor/libs/bootstrap-select/bootstrap-select.scss', 'resources/assets/vendor/libs/animate-css/animate.scss', 'resources/assets/vendor/libs/sweetalert2/sweetalert2.scss'])
@endsection

<!-- Vendor Scripts -->
@section('vendor-script')
    @vite(['resources/assets/vendor/libs/bootstrap-select/bootstrap-select.js', 'resources/assets/vendor/libs/sweetalert2/sweetalert2.js'])
@endsection

<!-- Page Scripts -->
@section('page-script')
    @vite(['resources/assets/js/extended-ui-sweetalert2.js'])
@endsection
@section('title', 'Dashboard')
@section('content')
    <h4>Dashboard / Data Ruangan</h4>
    <div class="container-xxl container-pb px-0">
        <div class="row" style="margin-top: 25px">
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h3 role="button" class="text-hover-warning mb-0">Data Ruangan</h2>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#basicModal">
                                Tambah Data
                            </button>
                    </div>
                    <hr>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table datatables-basic" id="myTable" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Foto Ruangan</th>
                                        <th>Nama Ruangan</th>
                                        <th>Tipe Ruangan</th>
                                        <th>Lokasi</th>
                                        <th>Maksimal Pegawai</th>
                                        <th>Link</th>
                                        <th>Kode</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ruangan as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img src="{{ asset('storage/room/' . $item->foto) }}" alt="" class="w-50">
                                            </td>
                                            <td>{{ $item->nama_ruangan }}</td>
                                            <td>
                                              @if ($item->tipe_ruangan)
                                                <span class="badge bg-label-success">ONLINE</span>
                                              @else
                                                <span class="badge bg-label-danger">OFFLINE</span>
                                              @endif
                                            </td>
                                            <td>{{ $item->lokasi }}</td>
                                            <td>{{ $item->maksimal_pegawai ?: '-'}}</td>
                                            <td>
                                              @if ($item->link_ruangan)
                                                <a href="{{$item->link_ruangan}}">{{ $item->link_ruangan}}</a>
                                              @else
                                                -
                                              @endif
                                            </td>
                                            <td>{{ $item->kode_ruangan ?: '-'}}</td>
                                            <td>
                                                @if ($item->status)
                                                    <span class="badge bg-success">Aktif</span>
                                                @else
                                                    <span class="badge bg-danger">Nonaktif</span>
                                                @endif
                                            </td>
                                            <td>
                                               <div class="d-flex gap-1">
                                                {{-- @if ($item->status)
                                                <button type="button" class="btn-aktif btn btn-success"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Non Aktifkan" value="{{ $item->id }}"><i
                                                        class="ti ti-player-pause"></i>
                                                </button>
                                            @else
                                                <button type="button" class="btn-non-aktif btn btn-danger"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Aktifkan"
                                                    value="{{ $item->id }}"><i class="ti ti-player-play"></i>
                                                </button>
                                            @endif --}}
                                            <button class="editButton btn btn-warning" type="button"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"
                                                aria-valuetext="{{ $item->id }}"><i
                                                    class="ti ti-edit"></i></button>
                                               </div>
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
    <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('ruanganAdmin.add') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                      <div class="row mb-3">
                          <div class="col mb-0">
                              <label for="formFile" class="form-label">Default file input example</label>
                              <input class="form-control @error('foto') is-invalid @enderror" type="file" id="formFile" name="foto">
                              @error('foto')
                                  <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                          </div>
                          <div class="col mb-0">
                              <label class="form-label">Nama Ruangan</label>
                              <input name="nama_ruangan" type="name" class="form-control @error('nama_ruangan') is-invalid @enderror" placeholder="Masukan Nama">
                              @error('nama_ruangan')
                                  <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                          </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col mb-3">
                          <label class="form-label">Lokasi</label>
                          <input name="lokasi" type="name" class="form-control @error('lokasi') is-invalid @enderror" placeholder="Masukan Lokasi">
                          @error('lokasi')
                              <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="col mb-3">
                          <label class="form-label">Maksimal Pegawai</label>
                          <input id="maksimal_pegawai" name="maksimal_pegawai" type="number" class="form-control @error('maksimal_pegawai') is-invalid @enderror" placeholder="Maksimal 15" min="1" max="15">
                          @error('maksimal_pegawai')
                              <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="row">
                          <div class="col mb-3">
                              <label for="selectpickerBasic" class="form-label">Tipe Ruangan</label>
                              <select id="selectpickerBasic" name="tipe_ruangan" class="selectpicker w-100 @error('tipe_ruangan') is-invalid @enderror" data-style="btn-default" onchange="toggleInputs()">
                                  <option value="0">OFFLINE</option>
                                  <option value="1">ONLINE</option>
                              </select>
                              @error('tipe_ruangan')
                                  <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                          </div>
                            <div class="col mb-0">
                                <label class="form-label">Link Room</label>
                                <input id="link_ruangan" name="link_ruangan" type="url" class="form-control @error('link_ruangan') is-invalid @enderror" placeholder="Masukan Link" disabled>
                                @error('link_ruangan')
                                  <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col mb-0">
                                <label class="form-label">Kode Room</label>
                                <input id="kode_ruangan" name="kode_ruangan" type="name" class="form-control @error('kode_ruangan') is-invalid @enderror" placeholder="Masukan Kode" disabled>
                                @error('kode_ruangan')
                                  <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                          </div>
                      </div>
                  </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('pricing-script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script
        src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.0.2/af-2.7.0/b-3.0.1/b-colvis-3.0.1/b-html5-3.0.1/b-print-3.0.1/cr-2.0.0/date-1.5.2/fc-5.0.0/fh-4.0.1/kt-2.12.0/r-3.0.0/rg-1.5.0/rr-1.5.0/sc-2.4.1/sb-1.7.0/sp-2.3.0/sl-2.0.0/sr-1.4.0/datatables.min.js">
    </script>
    <script>
        let table = new DataTable('#myTable', {
            paging: true, // Enable pagination
            searching: true, // Enable searching/filtering
            ordering: true, // Enable sorting
            lengthMenu: [10, 25, 50, 100], // Specify the available page lengths
            // Add more options as needed
        });
    </script>
    <script>
        function toggleInputs() {
            var selectElement = document.getElementById("selectpickerBasic");
            var linkInput = document.getElementById("link_ruangan");
            var kodeInput = document.getElementById("kode_ruangan");
            var maks = document.getElementById("maksimal_pegawai")

            if (selectElement.value === "1") {
                maks.disabled = true;
                linkInput.disabled = false;
                kodeInput.disabled = false;
                linkInput.style.cursor = "";
                kodeInput.style.cursor = "";
                maks.style.cursor = "not-allowed";
                linkInput.setAttribute("required","required");
                kodeInput.setAttribute("required","required");
                maks.removeAttribute("required");
            } else {
              maks.disabled = false;
                linkInput.disabled = true;
                kodeInput.disabled = true;
                linkInput.style.cursor = "not-allowed";
                kodeInput.style.cursor = "not-allowed";
                maks.style.cursor = "";
                linkInput.removeAttribute("required");
                kodeInput.removeAttribute("required");
                maks.setAttribute("required","required");
            }
        }
    </script>
    <script>
      $('.btn-aktif').on('click', function() {
          var btnId = $(this).val();
          Swal.fire({
              title: 'Apakah Kamu Yakin?',
              text: "Untuk Menonaktifkan Ruangan ini",
              icon: 'question',
              confirmButtonColor: '#3085d6',
              confirmButtonText: 'Ya',
              denyButtonText: 'Tidak'
          }).then((result) => {
              if (result.isConfirmed) {
                  window.location.href = "{{ route('ruanganAdmin.status', '') }}" + '/' + btnId
              }
          });
      });
      $('.btn-non-aktif').on('click', function() {
          var btnId = $(this).val();
          Swal.fire({
              title: 'Apakah Kamu Yakin?',
              text: "Untuk Mengaktifkan Ruangan ini",
              icon: 'question',
              confirmButtonColor: '#3085d6',
              confirmButtonText: 'Ya',
              denyButtonText: 'Tidak'
          }).then((result) => {
              if (result.isConfirmed) {
                  window.location.href = "{{ route('ruanganAdmin.status', '') }}" + '/' + btnId
              }
          });
      });
  </script>
@endpush
