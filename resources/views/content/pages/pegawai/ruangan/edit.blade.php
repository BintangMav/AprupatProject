<div class="modal-body">
  <div class="row mb-3">
          <form action="{{ route('ruangan.update', $pesanan->id) }}" method="POST">
              @csrf
            <div class="col-lg-4">
                <label for="flatpickr-datetime" class="form-label">Judul <span style="color: red;">*</span></label>
            </div>
            <div class="col-lg-8">
                <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul"
                    placeholder="Silahkan isi judul rapatnya..." value="{{$pesanan->judul}}" />
                @error('judul')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-lg-4">
                <label for="flatpickr-datetime" class="form-label">Agenda <span style="color: red;">*</span></label>
            </div>
            <div class="col-lg-8">
                <input type="text" class="form-control @error('agenda') is-invalid @enderror" name="agenda"
                    placeholder="Apa agenda rapatnya..." value="{{$pesanan->agenda}}" />
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
                    name="tanggal_waktu" placeholder="Piih tanggal" id="flatpickr-datetime" value="{{$pesanan->tanggal_pinjam}} {{$pesanan->waktu_pinjam}}"/>
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
                <input type="number" class="form-control @error('durasi') is-invalid @enderror" name="durasi"
                    id="durasiInput" placeholder="Berapa menit anda melaksanakan rapat..." min="1" value="{{$pesanan->durasi}}"/>
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
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>
@push('pricing-script')
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
