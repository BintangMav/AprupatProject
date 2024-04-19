@php $configData = Helper::appClasses(); @endphp @extends('layouts/layoutMaster') @section('page-style')
<link href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.0.2/af-2.7.0/b-3.0.1/b-colvis-3.0.1/b-html5-3.0.1/b-print-3.0.1/cr-2.0.0/date-1.5.2/fc-5.0.0/fh-4.0.1/kt-2.12.0/r-3.0.0/rg-1.5.0/rr-1.5.0/sc-2.4.1/sb-1.7.0/sp-2.3.0/sl-2.0.0/sr-1.4.0/datatables.min.css" rel="stylesheet">
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
<div class="container-fluid bg-white">
  <div class="px-5 pt-3 d-flex justify-content-between align-items-center" >
    <h3 >Ruangan</h3>
    <div class="mb-3 row d-flex justify-content-between align-items-center">
      <div class="col-md-6 px-0 d-flex align-items-center">
        <div class="w-100 d-flex form-control px-3 " style="align-items: center;">
          <i class="fa-solid fa-search" style="margin-right: 10px;"></i>
          <input class="w-100" type="search" placeholder="Cari Ruangan ..." id="html5-search-input" style="outline: none; border:none;" />
        </div>
      </div>
      <div class="col-md-6 px-0 d-flex justify-content-end">
        <div class="btn-search d-flex" style="gap: 1rem;">
          <button type="button" class="btn btn-primary">Online</button>
          <button type="button" class="btn btn-primary">Offline</button>
        </div>
      </div>
    </div>
  </div>
</div>
<hr class="m-0">
<div class="container-fluid bg-white">
  <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 px-5 pt-5 pb-5" style="overflow-x:auto; max-height:100vh;">
    @foreach ($ruangan as $item)
        <div class="col" enable>
          <div class="card mb-4 p-0">
            <img src="{{ asset('storage/room/' . $item->foto) }}" class="card-img-top" alt="..." height="200px">
            <div class="card-body">
              <h5 class="card-title">{{$item->nama_ruangan}}</h5>
              <p class="card-text mb-1"><i class="fa-solid fa-location-dot"></i> {{$item->lokasi}}</p>
              <p class="card-text mb-1"><i class="fa-solid fa-user"></i>
              @if ($item->maksimal_pegawai)
              Maksimal : {{$item->maksimal_pegawai}} orang
              @else
              Maksimal :  -
              @endif
              </p>
              <p class="card-text"><i class="fa-solid fa-globe"></i>
                @if ($item->tipe_ruangan)
                  <span class="badge bg-label-success">ONLINE</span>
                @else
                  <span class="badge bg-label-danger">OFFLINE</span>
                @endif
              </p>
              @if ($item->status === 1)
                <div class="button w-100">
                    {{-- <button class="btn btn-primary w-100 btn-toggle-sidebar" data-bs-toggle="offcanvas" data-bs-target="#addEventSidebar" aria-controls="addEventSidebar"> --}}
                        <a class="text-white btn btn-primary w-100" href="{{route('ruangan.detail',$item->id)}}"><span class="align-middle w-100">Pesan Ruangan</span></a>
                    {{-- </button> --}}
                </div>
              @else
                <div class="button w-100" style="cursor: not-allowed">
                  {{-- <button class="btn btn-primary w-100 btn-toggle-sidebar" data-bs-toggle="offcanvas" data-bs-target="#addEventSidebar" aria-controls="addEventSidebar" disabled> --}}
                      <a class="text-white btn btn-primary w-100" href="{{route('ruangan.detail',$item->id)}}"><span class="align-middle w-100">Pesan Ruangan</span></a>
                  {{-- </button> --}}
                </div>
              @endif
            </div>
          </div>
        </div>
    @endforeach
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
@endpush
