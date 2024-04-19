@php
    $configData = Helper::appClasses();
@endphp
@extends('layouts/layoutMaster')

@section('title', 'Fullcalendar - Apps')
@section('page-style')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.0/main.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.0/main.min.css" rel="stylesheet">
    <style>
        .fc-daygrid-week-number {
            display: none;
        }

        .fc-media-screen {
            height: 100%;
        }

        .fc-header-toolbar {
            font-size: 14px;
        }

        .fc-scroller {
            font-size: 14px;
        }

        .fc-button-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
        }

        /* Ganti warna latar belakang dan warna teks untuk tombol hover prev, next, dan today */
        .fc-button-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
            color: #fff;
        }

        /* Ganti warna latar belakang dan warna teks untuk tombol prev, next, dan today saat aktif */
        .fc-button-primary:active {
            background-color: #0056b3;
            border-color: #0056b3;
            color: #fff;
        }
    </style>
@endsection
@section('vendor-style')
    @vite(['resources/assets/vendor/libs/fullcalendar/fullcalendar.scss', 'resources/assets/vendor/libs/flatpickr/flatpickr.scss', 'resources/assets/vendor/libs/select2/select2.scss', 'resources/assets/vendor/libs/quill/editor.scss', 'resources/assets/vendor/libs/@form-validation/form-validation.scss', 'resources/assets/vendor/libs/flatpickr/flatpickr.scss', 'resources/assets/vendor/libs/jquery-timepicker/jquery-timepicker.scss', 'resources/assets/vendor/libs/pickr/pickr-themes.scss'])
@endsection

@section('page-style')
    @vite(['resources/assets/vendor/scss/pages/app-calendar.scss'])
@endsection

<!-- Vendor Scripts -->
@section('vendor-script')
    @vite(['resources/assets/vendor/libs/flatpickr/flatpickr.js'])
@endsection

<!-- Page Scripts -->
@section('page-script')
    @vite(['resources/assets/js/forms-pickers.js', 'resources/assets/js/ui-popover.js'])
@endsection

@section('content')
    <div class="row fixed">
        <div class="col-md-3">
            <div class="card mb-4 p-0" style="max-width: 20rem;">
                <img src="{{ asset('storage/room/' . $ruangan->foto) }}" class="card-img-top" alt="..." height="200px">
                <div class="card-body">
                    <h5 class="card-title">{{ $ruangan->nama_ruangan }}</h5>
                    <p class="card-text mb-1"><i class="fa-solid fa-location-dot"></i> {{ $ruangan->lokasi }}</p>
                    <p class="card-text mb-1"><i class="fa-solid fa-user"></i>
                        @if ($ruangan->maksimal_pegawai)
                            Maksimal : {{ $ruangan->maksimal_pegawai }} orang
                        @else
                            Maksimal : -
                        @endif
                    </p>
                    <p class="card-text"><i class="fa-solid fa-globe"></i>
                        @if ($ruangan->tipe_ruangan)
                            <span class="badge bg-label-success">ONLINE</span>
                        @else
                            <span class="badge bg-label-danger">OFFLINE</span>
                        @endif
                    </p>
                    <div class="button w-100">
                        <a class="text-white" href="  " data-bs-toggle="modal" data-bs-target="#basicModal"><span
                                class="align-middle w-100 btn btn-primary w-100 btn-toggle-sidebar">Pesan Ruangan</span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col" style="margin-left: 1rem;">
            <div class="card app-calendar-wrapper">
                <div class="row fixed">
                    <div class="col">
                        <div class="card app-calendar-content">
                            <div class="card-body  p-5" style="font-size: 1.5rem;">
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-m" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Buat Pesanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('ruangan.add') }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{ $ruangan->id }}" name="ruangan">
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <label for="flatpickr-datetime" class="form-label">Judul <span
                                        style="color: red;">*</span></label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                    name="judul" placeholder="Silahkan isi judul rapatnya..." />
                                @error('judul')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <label for="flatpickr-datetime" class="form-label">Agenda <span
                                        style="color: red;">*</span></label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control @error('agenda') is-invalid @enderror"
                                    name="agenda" placeholder="Apa agenda rapatnya..." />
                                @error('agenda')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <label for="flatpickr-datetime" class="form-label ">Waktu Rapat <span
                                        style="color: red;">*</span></label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control @error('tanggal_waktu') is-invalid @enderror"
                                    name="tanggal_waktu" placeholder="Piih tanggal" id="flatpickr-datetime" />
                                @error('tanggal_waktu')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <label for="flatpickr-datetime" class="form-label ">Durasi (Menit) <span
                                        style="color: red;">*</span></label>
                            </div>
                            <div class="col-lg-8">
                                <input type="number" class="form-control @error('durasi') is-invalid @enderror"
                                    name="durasi" id="durasiInput" placeholder="Berapa menit anda melaksanakan rapat..."
                                    min="1" />
                                @error('durasi')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <a class="btn btn-sm btn-primary mt-3 text-white" id="btn-30">30 Menit</a>
                                <a class="btn btn-sm btn-primary mt-3 text-white" id="btn-60">1 Jam</a>
                                <a class="btn btn-sm btn-primary mt-3 text-white" id="btn-90">1 Jam 30 Menit</a>
                                <a class="btn btn-sm btn-primary mt-3 text-white" id="btn-120">2 Jam</a>
                                <a class="btn btn-sm btn-primary mt-3 text-white" id="btn-150">2 Jam 30 Menit</a>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn-simpan btn btn-primary">Buat</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
@push('pricing-script')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.0/main.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                themeSystem: 'bootstrap5',
                headerToolbar: {
                    left: 'prev',
                    center: 'title',
                    right: 'next today,dayGridMonth,listDay'
                },
                weekNumbers: true,
                dayMaxEvents: true,
                events: function(fetchInfo, successCallback, failureCallback) {
                    $.ajax({
                        url: '/api/events/{{ $ruangan->id }}',
                        dataType: 'json',
                        success: function(response) {
                            var events = response.map(function(event) {
                                return {
                                    id: event.id,
                                    title: event.title,
                                    start: event.start,
                                    end: event.end,
                                };
                            });
                            successCallback(events);
                        },
                        error: function(xhr, status, error) {
                            failureCallback(error);
                        }
                    });
                },
                eventDidMount: function(info) {
                    var start = info.event.start;
                    var end = info.event.end;

                    var startTime = start.toLocaleTimeString([], {
                        hour: '2-digit',
                        minute: '2-digit'
                    });
                    var endTime = end ? end.toLocaleTimeString([], {
                        hour: '2-digit',
                        minute: '2-digit'
                    }) : '';

                    var tooltipContent = info.event.title + '<br>' +
                        startTime;

                    if (endTime) {
                        tooltipContent += ' - ' + endTime + '<br>';
                    }

                    $(info.el).tooltip({
                        title: tooltipContent,
                        placement: 'top',
                        html: true
                    });
                },
                eventClick: function(info) {
                    // Mendapatkan ID acara yang diklik
                    var eventId = info.event.id;
                    window.location.href = '/ruangan/detailPesanan/' + eventId;
                },
                    eventTimeFormat: { // Atur format waktu acara
                    hour: 'numeric',
                    minute: '2-digit',
                    separator: ' - ',
                    meridiem: 'short' // atau 'narrow', 'short', atau 'long'
                }
            });

            calendar.render();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#btn-30').on('click', () => {
                $('#durasiInput').val(30);
            })

            $('#btn-60').on('click', () => {
                $('#durasiInput').val(60);
            })

            $('#btn-90').on('click', () => {
                $('#durasiInput').val(90);
            })

            $('#btn-120').on('click', () => {
                $('#durasiInput').val(120);
            })

            $('#btn-150').on('click', () => {
                $('#durasiInput').val(150);
            })
        });
    </script>
@endpush
