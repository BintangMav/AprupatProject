@php $configData = Helper::Custom(); @endphp
@extends('layouts/layoutMasterAdmin')

@section('page-style')
    <link
        href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.0.2/af-2.7.0/b-3.0.1/b-colvis-3.0.1/b-html5-3.0.1/b-print-3.0.1/cr-2.0.0/date-1.5.2/fc-5.0.0/fh-4.0.1/kt-2.12.0/r-3.0.0/rg-1.5.0/rr-1.5.0/sc-2.4.1/sb-1.7.0/sp-2.3.0/sl-2.0.0/sr-1.4.0/datatables.min.css"
        rel="stylesheet">
@endsection
@section('vendor-style')
    @vite(['resources/assets/vendor/libs/animate-css/animate.scss', 'resources/assets/vendor/libs/sweetalert2/sweetalert2.scss'])
@endsection

@section('vendor-script')
    @vite(['resources/assets/vendor/libs/sweetalert2/sweetalert2.js'])
@endsection

@section('page-script')
    @vite(['resources/assets/js/extended-ui-sweetalert2.js'])
@endsection


@section('title', 'Dashboard')
@section('content')
    <h4>Dashboard / Data jabatan</h4>
    <div>
      @if (session()->has('message'))
      <div class="alert alert-success alert-dismissible" role="alert">
        {{session()->get('message')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
      </div>
    @endif
    </div>
    <div class="container-xxl container-pb px-0">
        <div class="row" style="margin-top: 25px">
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h3 role="button" class="text-hover-warning mb-0">Data jabatan</h2>
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
                                        <th>Nama Jabatan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jabatan as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama_jabatan }}</td>
                                            <td>
                                                @if ($item->status)
                                                    <span class="badge bg-success">Aktif</span>
                                                @else
                                                    <span class="badge bg-danger">Nonaktif</span>
                                            </td>
                                    @endif
                                    </td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            @if ($item->status)
                                                <button type="button" class="btn-aktif btn btn-success"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Non Aktifkan"
                                                    value="{{ $item->id }}"><i class="ti ti-player-pause"></i>
                                                </button>
                                            @else
                                                <button type="button" class="btn-non-aktif btn btn-danger"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Aktifkan"
                                                    value="{{ $item->id }}"><i class="ti ti-player-play"></i>
                                                </button>
                                            @endif
                                            <button class="editButton btn btn-warning" type="button"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"
                                                aria-valuetext="{{ $item->id }}"><i class="ti ti-edit"></i></button>
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
                <form action="{{ route('jabatan.add') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col mb-0">
                                <label class="form-label">Nama Jabatan</label>
                                <input name="nama_jabatan" type="name" class="form-control" placeholder="Masukan Jabatan...">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn-simpan btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editDropModal" tabindex="-1" aria-labelledby="editDropModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editDropModalLabel">Edit Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="response"></div>
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
        $('.editButton').on('click', function() {
            var btnId = $(this).attr('aria-valuetext');
            $.ajax({
                type: "GET",
                url: "{{ route('jabatan.edit', '') }}" + '/' + btnId,
                success: function(response) {
                    $('.response').html(response);
                    $('#editDropModal').modal('show');
                }
            });
        });
    </script>
    <script>
        $('.btn-aktif').on('click', function() {
            var btnId = $(this).val();
            Swal.fire({
                title: 'Apakah Kamu Yakin?',
                text: "Untuk Menonaktifkan Jabatan ini",
                icon: 'question',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ya',
                denyButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('jabatan.status', '') }}" + '/' + btnId
                }
            });
        });
        $('.btn-non-aktif').on('click', function() {
            var btnId = $(this).val();
            Swal.fire({
                title: 'Apakah Kamu Yakin?',
                text: "Untuk Mengaktifkan Jabatan ini",
                icon: 'question',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ya',
                denyButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('jabatan.status', '') }}" + '/' + btnId
                }
            });
        });
    </script>
@endpush
