@php $configData = Helper::Custom(); @endphp
@extends('layouts/layoutMasterAdmin')

@section('page-style')
<link href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.0.2/af-2.7.0/b-3.0.1/b-colvis-3.0.1/b-html5-3.0.1/b-print-3.0.1/cr-2.0.0/date-1.5.2/fc-5.0.0/fh-4.0.1/kt-2.12.0/r-3.0.0/rg-1.5.0/rr-1.5.0/sc-2.4.1/sb-1.7.0/sp-2.3.0/sl-2.0.0/sr-1.4.0/datatables.min.css" rel="stylesheet">
<style>
  #myTable_wrapper{
    width:120vw;
  }

</style>

@endsection
@section('vendor-style')
@vite([
  'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.scss',
  'resources/assets/vendor/libs/animate-css/animate.scss', 'resources/assets/vendor/libs/sweetalert2/sweetalert2.scss',
  ])
@endsection

<!-- Vendor Scripts -->
@section('vendor-script')
@vite([
  'resources/assets/vendor/libs/bootstrap-select/bootstrap-select.js',
  'resources/assets/vendor/libs/sweetalert2/sweetalert2.js',
  ])
@endsection

<!-- Page Scripts -->
@section('page-script')
@vite([
  'resources/assets/js/extended-ui-sweetalert2.js'
])
@endsection

@section('title', 'Dashboard')
@section('content')
<h4>Dashboard / Data Karyawan</h4>
<div class="container-xxl container-pb px-0">
  <div class="row" style="margin-top: 25px">
    <div class="col">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h3 role="button" class="text-hover-warning mb-0">Data Karyawan</h2>
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                    Tambah Data
                  </button>
            </div>
            <hr>
            <div class="card-body">
              <div class="table-responsive" >
                  <table class="table datatables-basic" id="myTable" style="width:100%">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>NIK</th>
                              <th>Nama</th>
                              <th>Jenis Kelamin</th>
                              <th>Alamat</th>
                              <th>No Telp</th>
                              <th>Email</th>
                              <th>Status Jabatan</th>
                              <th>Jabatan</th>
                              <th>Username</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($user as $item)
                            <tr>
                              <td>{{$loop->iteration}}</td>
                              <td>{{$item->nik}}</td>
                              <td>{{$item->nama}}</td>
                              <td>{{$item->jenis_kelamin}}</td>
                              <td>{{$item->alamat}}</td>
                              <td>{{$item->no_telp}}</td>
                              <td>{{$item->email}}</td>
                              <td>{{$item->status_jabatan}}</td>
                              <td>
                                @if ($item->Jabatan)
                                  {{$item->Jabatan->nama_jabatan}}
                                @else
                                  -
                                @endif
                              </td>
                              <td>{{$item->username}}</td>
                              <td>
                                <button class="editButton btn btn-warning" type="button"
                                  data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"
                                  aria-valuetext="{{ $item->id }}"><i class="ti ti-edit"></i>
                                </button>
                                <button class="btn-delete btn btn-danger" type="button"
                                  data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus"
                                  aria-valuetext="{{ $item->id }}"><i class="ti ti-trash"></i>
                                </button>
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
      <form action="{{route('karyawan.add')}}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="row mb-3">
            <div class="col mb-0">
              <label class="form-label">NIK</label>
              <input name="nik" type="name" class="form-control  @error('nik') is-invalid @enderror" placeholder="Masukan NIK">
              @error('nik')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="col mb-0">
              <label class="form-label">Nama</label>
              <input name="nama" type="name" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukan Nama">
              @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <div class="col mb-0">
              <label class="form-label">No. Telp</label>
              <input name="no_telp" type="name" class="form-control @error('no_telp') is-invalid @enderror" placeholder="Masukan No. Telpon">
              @error('no_telp')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
            <div class="col mb-0">
              <label class="form-label">Email</label>
              <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukan Email">
              @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
          </div>
          <div class="row mb-3">
            <div class="col mb-0">
              <label class="form-label">Username</label>
              <input name="username" type="name" class="form-control @error('username') is-invalid @enderror" placeholder="Masukan Username">
              @error('username')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
            <div class="col mb-0">
              <label class="form-label">Password</label>
              <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukan Password">
              @error('password')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
          </div>
          <div class="row">
            <div class="col mb-3">
              <label for="selectpickerBasic" class="form-label">Jenis Kelamin</label>
              <select id="selectpickerBasic" name="jenis_kelamin" class="selectpicker w-100 @error('jenis_kelamin') is-invalid @enderror" data-style="btn-default">
                <option value="laki">Laki-Laki</option>
                <option value="perempuan">Perempuan</option>
              </select>
              @error('jenis_kelamin')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
            <div class="col mb-3">
              <label for="selectpickerBasic" class="form-label">Status Jabatan</label>
              <select id="selectpickerBasic" name="status_jabatan" class="selectpicker w-100 @error('status_jabatan') is-invalid @enderror" data-style="btn-default">
                <option value="Direksi">Direksi</option>
                <option value="Manager">Manager</option>
                <option value="Staff">Staff</option>
              </select>
              @error('status_jabatan')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
            <div class="col mb-3">
              <label for="selectpickerBasic" class="form-label">Jabatan</label>
              <select id="selectpickerBasic" name="id_jabatan" class="selectpicker w-100 @error('id_jabatan') is-invalid @enderror" data-style="btn-default">
                @foreach ($jabatan as $item)
                <option value="{{$item->id}}">{{$item->nama_jabatan}}</option>
                @endforeach
              </select>
              @error('id_jabatan')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
            <div>
              <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
              <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="exampleFormControlTextarea1" rows="3" placeholder="Masukan Alamat..."></textarea>
              @error('alamat')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
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
  <script src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.0.2/af-2.7.0/b-3.0.1/b-colvis-3.0.1/b-html5-3.0.1/b-print-3.0.1/cr-2.0.0/date-1.5.2/fc-5.0.0/fh-4.0.1/kt-2.12.0/r-3.0.0/rg-1.5.0/rr-1.5.0/sc-2.4.1/sb-1.7.0/sp-2.3.0/sl-2.0.0/sr-1.4.0/datatables.min.js"></script>
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
            url: "{{ route('karyawan.edit', '') }}" + '/' + btnId,
            success: function(response) {
                $('.response').html(response);
                $('#editDropModal').modal('show');
            }
        });
    });
</script>
<script>
  $('.btn-delete').on('click', function() {
      var btnId = $(this).attr('aria-valuetext');
      Swal.fire({
          title: 'Apakah Kamu Yakin?',
          text: "Untuk Menghapus data Karyawan ini",
          icon: 'question',
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'Ya',
          denyButtonText: 'Tidak'
      }).then((result) => {
          if (result.isConfirmed) {
              window.location.href = "{{ route('karyawan.delete','') }}" + '/' + btnId
          }
      });
  });
</script>
@endpush
