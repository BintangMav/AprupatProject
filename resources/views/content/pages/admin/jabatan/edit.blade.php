<form action="{{ route('jabatan.update', $jabatan->id) }}" method="POST">
  @csrf
  <div class="modal-body">
    <div class="row mb-3">
      <div class="col mb-0">
        <label class="form-label">Nama Jabatan</label>
        <input name="nama_jabatan" type="name" class="form-control" placeholder="Masukan Jabatan..." value="{{$jabatan->nama_jabatan}}">
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Keluar</button>
    <button type="submit" class="btn btn-primary">Simpan</button>
  </div>
</form>
