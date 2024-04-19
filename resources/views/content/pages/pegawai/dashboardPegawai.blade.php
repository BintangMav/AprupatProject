@php $configData = Helper::appClasses(); @endphp
@extends('layouts/layoutMaster')

@section('page-style')
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
@section('title', 'Dashboard')
@section('content')
<h4>Dashboard </h4>
      <div class="card text-white" style="background: linear-gradient(to left, #ee9b18, #ff8c00, #ff8c00, #f0316a, #f0316a);">
        <div class="card-body d-flex align-items-center">
          <img src="https://i.pinimg.com/736x/8b/16/7a/8b167af653c2399dd93b952a48740620.jpg" alt="" style="width:150px; height:150px; border-radius:10px; margin-right:25px;">
          <div class="col-md-6 card-text justify-content-between">
            <p class="fs-1 fw-bold">Hello Staff !</p>
            <p>Hallo Selamat berkerja dan beraktivitas, Tetap Semangat!</p>
            <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
              <a href="#" class="d-flex align-items-center text-white me-2 mb-2">
                <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
                <span class="svg-icon svg-icon-4 me-1">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path opacity="0.3" d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z" fill="white" />
                    <path d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z" fill="white" />
                  </svg>
                </span>
                {{-- <!--end::Svg Icon-->{{ $karyawan->jabatan }} --}} Project Manager
              </a>
              <a href="#" class="d-flex align-items-center text-white me-2 mb-2">
                <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                <span class="svg-icon svg-icon-4 me-1">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="white" />
                    <path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="white" />
                  </svg>
                </span>
                {{-- <!--end::Svg Icon-->{{ $dataBisnis->nama_organisasi }} --}}PT. BIJAKSANA
              </a>
              <a href="#" class="d-flex align-items-center text-white mb-2">
                <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                <span class="svg-icon svg-icon-4 me-1">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="white" />
                    <path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="white" />
                  </svg>
                </span>
                {{-- <!--end::Svg Icon-->{{ $karyawan->email }} --}}admin1@gmail.com
              </a>
            </div>
          </div>
          <div class="col-md-4 card-time text-align-center" >
            <div id="clock" class="text-center text-white px-5">
              <span class="mt-5" id="date"></span>
              <span id="time"></span>
              <br>
            </div>
            <div class="btn w-100">
              <a class="py-2 w-100 rounded fs-6 text-white btn-primary"href="{{route('loginPegawai.logout')}}">Keluar Aplikasi</a>
            </div>
          </div>
        </div>
      </div>
      <div class="row" style="margin-top: 25px">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                  <div class="title">
                    <h3 role="button" class="text-hover-warning mb-0">Ruang yang tersedia</h2>
                      <p>Anda bisa melihat ruangan yang tersedia atau bisa dipesan</p>
                    </div>
                      <button class="btn btn-primary">
                        <a href="{{route('ruangan.index')}}" class="text-white">Pesan Ruang Meet</a>
                      </button>
                </div>
                <hr class="m-0">
                <div class="card-body pt-0">
                    <div class="table-responsive" >
                      <div class="container mt-5">
                        <table class="table datatables-basic" id="myTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Ruangan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
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
    function generateRandomData() {
        var data = [];
        for (var i = 1; i <= 50; i++) {
            data.push({
                id: i,
                fullName: 'User ' + i,
                email: 'user' + i + '@example.com',
                startDate: '2022-01-01',
                salary: Math.floor(Math.random() * 10000) + 30000, // Gaji antara 30000 dan 39999
                status: ['Current', 'Professional', 'Rejected', 'Resigned', 'Applied'][Math.floor(Math.random() * 5)]
            });
        }
        return data;
    }

    var tbody = document.querySelector('#myTable tbody');

    generateRandomData().forEach(function(row) {
        var tr = document.createElement('tr');
        tr.innerHTML = `
            <td>${row.id}</td>
            <td>${row.fullName}</td>
            <td>${row.email}</td>
        `;
        tbody.appendChild(tr);
    });

    let table = new DataTable('#myTable', {
        paging: true, // Enable pagination
        searching: true, // Enable searching/filtering
        ordering: true, // Enable sorting
        lengthMenu: [5,10], // Specify the available page lengths
        // Add more options as needed
    });
  </script>
  <script>
    function updateClock() {
      var now = new Date();
      var hours = now.getHours();
      var minutes = now.getMinutes();
      var seconds = now.getSeconds();
      var day = now.getDate();
      var month = now.getMonth() + 1; // Month starts from 0, so add 1
      var year = now.getFullYear();
      // Day Names
      var dayNames = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
      var dayName = dayNames[now.getDay()];
      // Month Names
      var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
      var monthName = monthNames[now.getMonth()];
      document.getElementById('time').innerHTML = hours + ':' + minutes + ':' + seconds;
      document.getElementById('date').innerHTML = dayName + ', ' + day + ' ' + monthName + ' ' + year;
    }
    setInterval(updateClock, 1000); // Update setiap detik
    updateClock(); // Panggil fungsi pertama kali agar tidak menunggu 1 detik pertama
  </script>

   @endpush
