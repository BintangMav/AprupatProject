@php $configData = Helper::Custom(); @endphp
@extends('layouts/layoutMasterAdmin')

@section('page-style')
<link href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.0.2/af-2.7.0/b-3.0.1/b-colvis-3.0.1/b-html5-3.0.1/b-print-3.0.1/cr-2.0.0/date-1.5.2/fc-5.0.0/fh-4.0.1/kt-2.12.0/r-3.0.0/rg-1.5.0/rr-1.5.0/sc-2.4.1/sb-1.7.0/sp-2.3.0/sl-2.0.0/sr-1.4.0/datatables.min.css" rel="stylesheet">
<style>
  #clock {
    font-size: 1.5em;
  }

  #time {
    font-size: 2em;
  }
#myTable1_wrapper{
  .row{
    width: 100vw;
  }
}
#myTable2_wrapper{
  .row{
    width: 100vw;
  }
}
</style>
@endsection
@section('title', 'Dashboard')
@section('content')
<h4>Dashboard </h4>
<div class="container-xxl flex-grow-1 container-p-b px-0">
    <div class="row g-4 mb-4">
      <div class="col-sm-5 col-md-4">
        <div class="card">
          <div class="card-body">
            <div class="d-flex align-items-start justify-content-between">
              <div class="content-left">
                <span>Karyawan</span>
                <div class="d-flex align-items-end mt-2">
                  <h3 class="mb-0 me-2">200</h3>
                </div>
                <small>Total Karyawan</small>
              </div>
              <span class="badge bg-label-primary rounded p-2">
                <i class="ti ti-user ti-sm"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-5 col-md-4">
        <div class="card">
          <div class="card-body">
            <div class="d-flex align-items-start justify-content-between">
              <div class="content-left">
                <span>Ruang</span>
                <div class="d-flex align-items-end mt-2">
                  <h3 class="mb-0 me-2">200</h3>
                </div>
                <small>Total Ruang</small>
              </div>
              <span class="badge bg-label-success rounded p-2">
                <i class="ti ti-door ti-sm"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-5 col-md-4">
        <div class="card">
          <div class="card-body">
            <div class="d-flex align-items-start justify-content-between">
              <div class="content-left">
                <span>Data Ruang dipinjam</span>
                <div class="d-flex align-items-end mt-2">
                  <h3 class="mb-0 me-2">200</h3>
                </div>
                <small>Total Data Ruang dipinjam</small>
              </div>
              <span class="badge bg-label-danger rounded p-2">
                <i class="ti ti-clipboard ti-sm"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  <div class="row" >
    <div class="col-6">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between pb-0"  style="width: 700px">
                <h3 role="button" class="text-hover-warning mb-0">Data Karyawan</h2>
            </div>
            <hr class="m-0 mt-2">
            <div class="card-body pt-0">
                <div class="table-responsive" >
                  <div class="container mt-5">
                    <table class="table datatables-basic" id="myTable1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Start Date</th>
                                <th>Salary</th>
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
    <div class="col-6">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between pb-0">
                <h3 role="button" class="text-hover-warning mb-0">Data Ruangan</h2>
            </div>
            <hr class="m-0 mt-2">
            <div class="card-body pt-0">
                <div class="table-responsive" >
                  <div class="container mt-5">
                    <table class="table datatables-basic" id="myTable2">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Start Date</th>
                                <th>Salary</th>
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
</div>
  @endsection
  @push('pricing-script')
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.0.2/af-2.7.0/b-3.0.1/b-colvis-3.0.1/b-html5-3.0.1/b-print-3.0.1/cr-2.0.0/date-1.5.2/fc-5.0.0/fh-4.0.1/kt-2.12.0/r-3.0.0/rg-1.5.0/rr-1.5.0/sc-2.4.1/sb-1.7.0/sp-2.3.0/sl-2.0.0/sr-1.4.0/datatables.min.js"></script>
  <script>
    function generateRandomData(tableId) {
        var data = [];
        for (var i = 1; i <= 100; i++) {
            data.push({
                id: i,
                fullName: 'User ' + i,
                email: 'user' + i + '@example.com',
                startDate: '2022-01-01',
                salary: Math.floor(Math.random() * 10000) + 30000, // Salary between 30000 and 39999
                status: ['Current', 'Professional', 'Rejected', 'Resigned', 'Applied'][Math.floor(Math.random() * 5)]
            });
        }
        return data;
    }

    var tbody1 = document.querySelector('#myTable1 tbody');
    var tbody2 = document.querySelector('#myTable2 tbody');

    generateRandomData('myTable1').forEach(function(row) {
        var tr = document.createElement('tr');
        tr.innerHTML = `
            <td>${row.id}</td>
            <td>${row.fullName}</td>
            <td>${row.email}</td>
            <td>${row.startDate}</td>
            <td>${row.salary}</td>
            <td>${row.status}</td>
        `;
        tbody1.appendChild(tr);
    });

    generateRandomData('myTable2').forEach(function(row) {
        var tr = document.createElement('tr');
        tr.innerHTML = `
            <td>${row.id}</td>
            <td>${row.fullName}</td>
            <td>${row.email}</td>
            <td>${row.startDate}</td>
            <td>${row.salary}</td>
            <td>${row.status}</td>
        `;
        tbody2.appendChild(tr);
    });

    let table1 = new DataTable('#myTable1', {
        paging: true, // Enable pagination
        searching: true, // Enable searching/filtering
        ordering: true, // Enable sorting
        lengthMenu: [10, 25, 50, 100], // Specify the available page lengths
        // Add more options as needed
    });

    let table2 = new DataTable('#myTable2', {
        paging: true, // Enable pagination
        searching: true, // Enable searching/filtering
        ordering: true, // Enable sorting
        lengthMenu: [10, 25, 50, 100], // Specify the available page lengths
        // Add more options as needed
    });
</script>

  {{-- <script>
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
  </script> --}}

   @endpush
