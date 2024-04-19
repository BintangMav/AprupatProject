@php $configData = Helper::appClasses(); @endphp @extends('layouts/layoutMaster') @section('page-style')
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
    </style>
@endsection
@section('title', 'Room Page')
@section('content')
    <h4>Dashboard / Room</h4>
    <div class="card">
      <div class="card-header" style="padding-bottom: 5px">
        <div class=" d-flex justify-content-between">
          <h4>Detail Pesanan</h4>
          <div class="d-flex gap-1">
            @if(auth()->id() === $pesanan->user->id)
            <button class="editButton btn-sm btn btn-warning" type="button" data-bs-toggle="tooltip" data-bs-placement="top"
                title="Edit" aria-valuetext="{{ $pesanan->id }}"><i class="ti ti-edit"></i>
            </button>
            <button class="deleteButton btn-sm btn btn-danger" type="button" data-bs-toggle="tooltip" data-bs-placement="top"
                title="Delete" aria-valuetext="{{ $pesanan->id }}"><i class="ti ti-trash"></i>
            </button>
            @endif
          </div>
        </div>
      </div>
      <hr class="m-0">
     <div class="card-body">
         <div class="table-responsive">
             <table class="table table-bordered table-striped">
                 <tr>
                     <th>ID Pesanan</th>
                     <td>#{{$pesanan->id}}</td>
                 </tr>
                 <tr>
                     <th>Judul</th>
                     <td>{{$pesanan->judul}}</td>
                 </tr>
                 <tr>
                     <th>Agenda</th>
                     <td>{{$pesanan->agenda}}</td>
                 </tr>
                 <tr>
                  @php
                      use Carbon\Carbon;

                      // Mengonversi tanggal dan waktu pinjam ke format yang diinginkan
                      $tanggalPinjam = Carbon::parse($pesanan->tanggal_pinjam);
                      $waktuPinjam = Carbon::parse($pesanan->waktu_pinjam);
                      $waktuSelesai = Carbon::parse($pesanan->waktu_selesai);

                      $formattedDate = $tanggalPinjam->locale('id')->isoFormat('dddd, D MMMM YYYY');

                      $formattedWaktuPinjam = $waktuPinjam->format('h:iA');
                      $formattedWaktuSelesai = $waktuSelesai->format('h:iA');
                  @endphp
                     <th>Waktu</th>
                     <td>{{$formattedDate }} at {{$formattedWaktuPinjam }} - {{$formattedWaktuSelesai}}</td>
                 </tr>
                 <tr>
                     <th>Ruangan</th>
                     <td>{{$pesanan->ruangan->nama_ruangan}}</td>
                 </tr>
                 <tr>
                     <th>Pemesan</th>
                     <td>{{$pesanan->user->nama}}</td>
                 </tr>
             </table>
         </div>
     </div>
  </div>
  <div class="modal fade" id="editDropModal" tabindex="-1" aria-labelledby="editDropModalLabel" aria-hidden="true">
    <div class="modal-dialog">
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
              url: "{{ route('ruangan.edit', '') }}" + '/' + btnId,
              success: function(response) {
                  $('.response').html(response);
                  $('#editDropModal').modal('show');
              }
          });
      });
  </script>
@endpush
